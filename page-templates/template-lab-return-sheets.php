<?php
/**
 * Template Name: Lab Return Sheet
 * The template for displaying the lab return sheets
 *
 * @package understrap
 */
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
// get_header();
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
preg_match('~\?(\d+)~', $actual_link, $m );
echo "order number: " . $m[1] . "<br />"; // $m[1] is your string
$order = WC_get_order($m[1]);
?>
<script src="https://unpkg.com/pdf-lib@1.4.0"></script>
<script src="https://unpkg.com/downloadjs@1.4.7"></script>


<!-- <iframe id="pdf" style="width: 100%; height: 100%;"></iframe> -->
<?php 
//use categories for each one to make this code shorter
function get_test_types($item) {
  $test_type_array = [];
  $product_id = $item->get_product_id();
  echo "product id(s): " . $product_id . "<br/>";
  switch ($product_id) {
    //Green to uk
    case '186':
      array_push($test_type_array, "Day 2");
      break;
    // Green standard travel pack
    case '100':
      array_push($test_type_array, "F2F");
      array_push($test_type_array, "Day 2");
      break;
    //Green From UK Travel Pack
    case '388':
      array_push($test_type_array , "F2F");
      break;
    //Amber To UK Travel Pack
    case '101':
      array_push($test_type_array , "Day 2");
      array_push($test_type_array, "Day 8");
      break;
    //Amber To UK Travel Plus Release Pack
    case '474':
      array_push($test_type_array , "Day 2");
      array_push($test_type_array , "Day 5");
      array_push($test_type_array , "Day 8");
      break;
    //Amber Standard Travel Pack
    case '102':
      array_push($test_type_array , "F2F");
      array_push($test_type_array , "Day 2");
      array_push($test_type_array , "Day 8");
      break;
    //Amber Spain Travel Pack
    case '389':
      array_push($test_type_array , "Day 2");
      array_push($test_type_array , "Day 8");
      break;
    //Amber Standard Travel Plus Release Pack
    case '195':
      array_push($test_type_array , "F2F");
      array_push($test_type_array , "Day 2");
      array_push($test_type_array , "Day 5");
      array_push($test_type_array , "Day 8");
      break;
    //Pre-Departure Test
    case '305':
      array_push($test_type_array , "F2F");
      break;
    //Day 2 Test
    case '306':
      array_push($test_type_array , "Day 2");
      break;
    //Day 8 test
    case '307':
      array_push($test_type_array , "Day 8");
      break;
    //Test To Release (Day 5)
    case '204':
      array_push($test_type_array , "Day 5");
      break;
    //Test to release on site
    case '635':
      array_push($test_type_array , "Day 5");
      break;
    //day 2 onsite
    case '637':
      array_push($test_type_array , "Day 2");
      break;
    //amber to uk on site
    case '639':
      array_push($test_type_array , "Day 2");
      array_push($test_type_array, "Day 8");
      break;
    //Pre-Departure Test Click and collecy
    case '3554':
      array_push($test_type_array , "F2F");
      break;
    //Amber To UK Travel Pack click and collect
    case '3556':
      array_push($test_type_array , "Day 2");
      array_push($test_type_array, "Day 8");
      break;
    //Green to uk - click and collect
    case '3560':
      array_push($test_type_array, "Day 2");
      break;
    // Fully vaccinated travel
    case '3842':
      array_push($test_type_array, "Day 2");
      break;
  }
  return $test_type_array;
};
	$data_array = [];
  foreach ( $order->get_items() as  $item_key => $item ) {
    // if (true) {//$item needs data sheet
      $item_test_types = get_test_types($item);
      foreach ($item_test_types as $index => $item_test_type) {
        $item_data = [];
        $item_data["test"] = $item_test_type;
        $item_data["orderId"] = $order->get_id();
        if ($item->get_meta( 'booking_reference', true ) != null) { 
          $item_data["bookingRef"] = $item->get_meta( 'booking_reference', true );
        }
        if ($item->get_meta( 'first_name', true ) != null && $item->get_meta( 'surname', true ) != null) { 
          $item_data["fullName"] = $item->get_meta( 'first_name', true ) . " " . $item->get_meta( 'surname', true );
        }
        if ($item->get_meta( 'sex', true ) != null) { 
          $item_data["sex"] = $item->get_meta( 'sex', true );
        }
        if ($item->get_meta( 'passport_number', true ) != null) { 
          $item_data["idNum"] = $item->get_meta( 'passport_number', true );
        }
        if ($item->get_meta( 'birth_date', true ) != null) { 
          $item_data["dob"] = $item->get_meta( 'birth_date', true );
        }
        if ($item->get_meta( 'ethnicity', true ) != null) { 
          $item_data["ethnicity"] = $item->get_meta( 'ethnicity', true );
        }
        if ($item->get_meta( 'vaccination_status', true ) == "Yes") {
          $item_data["vaccinated"] = true;
        } else {
          $item_data["vaccinated"] = false;
        }
        if ($item->get_meta( 'vaccine_type', true ) != null) {
        $item_data["vaccine"] = $item->get_meta( 'vaccine_type', true );
        } else {
          $item_data["vaccine"] = " ";
        }

        if ($item->get_meta( 'address_line_1', true ) != null) {
          $item_data["address"] = $item->get_meta( 'address_line_1', true );
        }
        if ($item->get_meta( 'address_line_2', true ) != null) {
          $item_data["address"] .= ", " . $item->get_meta( 'address_line_2', true );
        }
        if ($item->get_meta( 'town_or_city', true ) != null) {
          $item_data["address"] .= ", " . $item->get_meta( 'town_or_city', true );
        }
        $item_data["postcode"] = $item->get_meta( 'postcode', true );
        $item_data["mobile"] = $item->get_meta( 'phone_number', true );
        $item_data["email"] = $item->get_meta( 'email_address', true );

        if ($item_test_type == "Day 2" || $item_test_type == "Day 8" || $item_test_type == "Day 5") {
          if ($item->get_meta( 'departure_from_abroad_date', true ) != null) { 
            $item_data["departureDate"] = $item->get_meta( 'departure_from_abroad_date', true );
          };
          if ($item->get_meta( 'arrival_in_uk_date', true ) != null) { 
            $item_data["arrivalDate"] = $item->get_meta( 'arrival_in_uk_date', true );
          };
          if ($item->get_meta( 'country_from', true ) != null) { 
            $item_data["countriesTravelled"] = $item->get_meta( 'country_from', true );
          };
          if ($item->get_meta( 'flight_number', true ) != null) { 
            $item_data["flightNum"] = $item->get_meta( 'flight_number', true );
          };
        }
        if ($item_test_type == "Day 2" || $item_test_type == "Day 8") {
          if ($item->get_meta( 'nhs_number', true ) != null) { 
            $item_data["nhsNum"] = $item->get_meta( 'nhs_number', true );
          };
        } 


        array_push($data_array, $item_data);

      }
      // get sheet count i.e if the item is an amber pack
      // then the sheet count is two and you need to output a Day  2 and a Day  8 into
      // $data_array
    // }
  }
?>
<script>
  data = <?php echo json_encode($data_array); ?>;
  const pdfs = {
    "day2": '<?php bloginfo('template_directory'); ?>/src/pdf/day-2-form.pdf',
    "day5": '<?php bloginfo('template_directory'); ?>/src/pdf/day-5-form.pdf',
    "day8": '<?php bloginfo('template_directory'); ?>/src/pdf/day-8-form.pdf',
    "f2f": '<?php bloginfo('template_directory'); ?>/src/pdf/f2f-form.pdf',
  };

  const { degrees, PDFDocument, rgb, StandardFonts } = PDFLib

    // Fetch an existing PDF document
  function selectPdf(test, pdfs) {
    switch (test) {
      case 'Day 2': return pdfs.day2
      case 'Day 5': return pdfs.day5
      case 'Day 8': return pdfs.day8
      case 'F2F': return pdfs.f2f
      default: break;
    }
  }

  function fillInPdf(dataSingle, currentPage) {
    if(dataSingle.test == 'Day 2' || dataSingle.test == 'Day 8') {
      // Fill reference no. field
      currentPage.drawText(dataSingle.bookingRef, {
        x: 210,
        y: 699,
        size: 11,
        color: rgb(0, 0, 0),
      })
      // // Fill gp name field
      // currentPage.drawText(dataSingle.gpName, {
      //   x: 210,
      //   y: 497,
      //   size: 12,
      //   color: rgb(0, 0, 0),
      // })
      // // Fill gp email field
      // currentPage.drawText(dataSingle.gpEmail, {
      //   x: 210,
      //   y: 475,
      //   size: 12,
      //   color: rgb(0, 0, 0),
      // })
      if (dataSingle.hasOwnProperty("fullName")) {
        // Fill name field
        currentPage.drawText(dataSingle.fullName, {
          x: 210,
          y: 452,
          size: 12,
          color: rgb(0, 0, 0),
        })
      }
      if (dataSingle.hasOwnProperty("address")) {
        // Fill address field
        currentPage.drawText(dataSingle.address, {
          x: 210,
          y: 434,
          size: 12,
          color: rgb(0, 0, 0),
        })
      }
      if (dataSingle.hasOwnProperty("postcode")) {
        // Fill postcode field
        currentPage.drawText(dataSingle.postcode, {
          x: 210,
          y: 415,
          size: 12,
          color: rgb(0, 0, 0),
        })
      }
      if (dataSingle.hasOwnProperty("email")) {
        // Fill email field
        currentPage.drawText(dataSingle.email, {
          x: 210,
          y: 396,
          size: 12,
          color: rgb(0, 0, 0),
        })
      }
      if (dataSingle.hasOwnProperty("mobile")) {
        // Fill number field
        currentPage.drawText(dataSingle.mobile, {
          x: 210,
          y: 376,
          size: 12,
          color: rgb(0, 0, 0),
        })
      }
      if (dataSingle.hasOwnProperty("dob")) {
        // Fill in birth day field
        currentPage.drawText(String(dataSingle.dob)[8], {
          x: 212,
          y: 347,
          size: 12,
          color: rgb(0, 0, 0),
        })
        // Fill in birth day field
        currentPage.drawText(String(dataSingle.dob)[9], {
          x: 234,
          y: 347,
          size: 12,
          color: rgb(0, 0, 0),
        })
        // Fill in birth month field
        currentPage.drawText(String(dataSingle.dob)[5], {
          x: 255,
          y: 347,
          size: 12,
          color: rgb(0, 0, 0),
        })
        // Fill in birth month field
        currentPage.drawText(String(dataSingle.dob)[6], {
          x: 275,
          y: 347,
          size: 12,
          color: rgb(0, 0, 0),
        })
        // Fill in birth year field
        currentPage.drawText(String(dataSingle.dob)[2], {
          x: 295,
          y: 347,
          size: 12,
          color: rgb(0, 0, 0),
        })
        // Fill in birth year field
        currentPage.drawText(String(dataSingle.dob)[3], {
          x: 315,
          y: 347,
          size: 12,
          color: rgb(0, 0, 0),
        })
      }
      // Fill in sex field
      var sex = dataSingle.sex
      var sexX = sex == 'Female' ? 207 : sex == 'Male' ? 257 : 298
      currentPage.drawText('X', {
        x: sexX,
        y: 327,
        size: 12,
        color: rgb(0, 0, 0),
      })
      // Fill in ethnicity field
      if (dataSingle.hasOwnProperty("ethnicity")) {
          currentPage.drawText(dataSingle.ethnicity, {
            x: 210,
            y: 310,
            size: 12,
            color: rgb(0, 0, 0),
          })
        }
      // Fill in vaccine y/n field
      var vaccinated = dataSingle.vaccinated
      var vaccineX = vaccinated == true ? 207 : 237
      currentPage.drawText('X', {
        x: vaccineX,
        y: 290,
        size: 12,
        color: rgb(0, 0, 0),
      })
      // Fill in vaccine field
      if (vaccinated && dataSingle.hasOwnProperty("vaccine")) {
        currentPage.drawText(dataSingle.vaccine, {
          x: 342,
          y: 291,
          size: 12,
          color: rgb(0, 0, 0),
        })
      }
      // Fill in nhs field
      if (dataSingle.hasOwnProperty("nhsNum")) {
        currentPage.drawText(dataSingle.nhsNum, {
          x: 210,
          y: 270,
          size: 12,
          color: rgb(0, 0, 0),
        })
      }
      // Fill in passport field
      if (dataSingle.hasOwnProperty("idNum")) {
          currentPage.drawText(dataSingle.idNum, {
          x: 210,
          y: 250,
          size: 12,
          color: rgb(0, 0, 0),
        })
      }
      if (dataSingle.hasOwnProperty("flightNum")) {
        // Fill in transport number field
        currentPage.drawText(dataSingle.flightNum, {
          x: 275,
          y: 230,
          size: 12,
          color: rgb(0, 0, 0),
        })
      }
      if (dataSingle.hasOwnProperty("arrivalDate")) {
        // Fill in arrival day field
        currentPage.drawText(String(dataSingle.arrivalDate)[8], {
          x: 212,
          y: 210,
          size: 12,
          color: rgb(0, 0, 0),
        })
        // Fill in arrival day field
        currentPage.drawText(String(dataSingle.arrivalDate)[9], {
          x: 234,
          y: 210,
          size: 12,
          color: rgb(0, 0, 0),
        })
        // Fill in arrival month field
        currentPage.drawText(String(dataSingle.arrivalDate)[5], {
          x: 254,
          y: 210,
          size: 12,
          color: rgb(0, 0, 0),
        })
        // Fill in arrival month field
        currentPage.drawText(String(dataSingle.arrivalDate)[6], {
          x: 274,
          y: 210,
          size: 12,
          color: rgb(0, 0, 0),
        })
        // Fill in arrival year field
        currentPage.drawText(String(dataSingle.arrivalDate)[2], {
          x: 296,
          y: 210,
          size: 12,
          color: rgb(0, 0, 0),
        })
        // Fill in arrival year field
        currentPage.drawText(String(dataSingle.arrivalDate)[3], {
          x: 316,
          y: 210,
          size: 12,
          color: rgb(0, 0, 0),
        })
      }
      if (dataSingle.hasOwnProperty("departureDate")) {
        // Fill in depart day field
        currentPage.drawText(String(dataSingle.departureDate)[8], {
          x: 212,
          y: 175,
          size: 12,
          color: rgb(0, 0, 0),
        })
        // Fill in depart day field
        currentPage.drawText(String(dataSingle.departureDate)[9], {
          x: 234,
          y: 175,
          size: 12,
          color: rgb(0, 0, 0),
        })
        // Fill in depart month field
        currentPage.drawText(String(dataSingle.departureDate)[5], {
          x: 254,
          y: 175,
          size: 12,
          color: rgb(0, 0, 0),
        })
        // Fill in depart month field
        currentPage.drawText(String(dataSingle.departureDate)[6], {
          x: 274,
          y: 175,
          size: 12,
          color: rgb(0, 0, 0),
        })
        // Fill in depart year field
        currentPage.drawText(String(dataSingle.departureDate)[2], {
          x: 296,
          y: 175,
          size: 12,
          color: rgb(0, 0, 0),
        })
        // Fill in depart year field
        currentPage.drawText(String(dataSingle.departureDate)[3], {
          x: 316,
          y: 175,
          size: 12,
          color: rgb(0, 0, 0),
        })
      }
      if (dataSingle.hasOwnProperty("countriesTravelled")) {
        // Fill in countries field
        currentPage.drawText(dataSingle.countriesTravelled, {
          x: 260,
          y: 143,
          size: 12,
          color: rgb(0, 0, 0),
        })
      }
    }
    if(dataSingle.test == 'Day 5') {
      // Fill reference no. field
      currentPage.drawText(dataSingle.bookingRef, {
        x: 215,
        y: 693,
        size: 11,
        color: rgb(0, 0, 0),
      })
      if (dataSingle.hasOwnProperty("fullName")) {
        // Fill full name field
        currentPage.drawText(dataSingle.fullName, {
          x: 200,
          y: 471,
          size: 12,
          color: rgb(0, 0, 0),
        })
      }
      if (dataSingle.hasOwnProperty("address")) {
        // Fill address field
        currentPage.drawText(dataSingle.address, {
          x: 200,
          y: 451,
          size: 12,
          color: rgb(0, 0, 0),
        })
      }
      if (dataSingle.hasOwnProperty("postcode")) {
        // Fill postcode field
        currentPage.drawText(dataSingle.postcode, {
          x: 200,
          y: 429,
          size: 12,
          color: rgb(0, 0, 0),
        })
      }
      if (dataSingle.hasOwnProperty("email")) {
        // Fill email field
        currentPage.drawText(dataSingle.email, {
          x: 200,
          y: 409,
          size: 12,
          color: rgb(0, 0, 0),
        })
      }
      if (dataSingle.hasOwnProperty("mobile")) {
        // Fill mobile field
        currentPage.drawText(dataSingle.mobile, {
          x: 200,
          y: 386,
          size: 12,
          color: rgb(0, 0, 0),
        })
      }
      if (dataSingle.hasOwnProperty("dob")) {
        // Fill in birth day field
        currentPage.drawText(String(dataSingle.dob)[8], {
          x: 202,
          y: 353,
          size: 12,
          color: rgb(0, 0, 0),
        })
        // Fill in birth day field
        currentPage.drawText(String(dataSingle.dob)[9], {
          x: 225,
          y: 353,
          size: 12,
          color: rgb(0, 0, 0),
        })
        // Fill in birth month field
        currentPage.drawText(String(dataSingle.dob)[5], {
          x: 248,
          y: 353,
          size: 12,
          color: rgb(0, 0, 0),
        })
        // Fill in birth month field
        currentPage.drawText(String(dataSingle.dob)[6], {
          x: 271,
          y: 353,
          size: 12,
          color: rgb(0, 0, 0),
        })
        // Fill in birth year field
        currentPage.drawText(String(dataSingle.dob)[2], {
          x: 294,
          y: 353,
          size: 12,
          color: rgb(0, 0, 0),
        })
        // Fill in birth year field
        currentPage.drawText(String(dataSingle.dob)[3], {
          x: 317,
          y: 353,
          size: 12,
          color: rgb(0, 0, 0),
        })
      }
        // Fill in sex field
        var sex = dataSingle.sex
        var sexX = sex == 'Female' ? 196 : sex == 'Male' ? 252 : 298
        currentPage.drawText('X', {
          x: sexX,
          y: 332,
          size: 12,
          color: rgb(0, 0, 0),
        })
        // Fill in ethnicity field
      if (dataSingle.hasOwnProperty("ethnicity")) {
        currentPage.drawText(dataSingle.ethnicity, {
          x: 200,
          y: 312,
          size: 12,
          color: rgb(0, 0, 0),
        })
      }
      // Fill in vaccine y/n field
      var vaccinated = dataSingle.vaccinated
      var vaccineX = vaccinated == true ? 196 : 230
      currentPage.drawText('X', {
        x: vaccineX,
        y: 291,
        size: 12,
        color: rgb(0, 0, 0),
      })
      // Fill in vaccine field
      if (vaccinated && dataSingle.hasOwnProperty("vaccine")) {
        currentPage.drawText(dataSingle.vaccine, {
          x: 347,
          y: 291,
          size: 12,
          color: rgb(0, 0, 0),
        })
      }
      // Fill in nhs field
      if(dataSingle.hasOwnProperty("nhsNum")) {
        currentPage.drawText(dataSingle.nhsNum, {
          x: 200,
          y: 267,
          size: 12,
          color: rgb(0, 0, 0),
        })
      }
      // Fill in passport field
      
      if (dataSingle.hasOwnProperty("idNum")) {
        currentPage.drawText(dataSingle.idNum, {
          x: 200,
          y: 245,
          size: 12,
          color: rgb(0, 0, 0),
        })
      }
      if (dataSingle.hasOwnProperty("flightNum")) {
        // Fill in transport number field
        currentPage.drawText(dataSingle.flightNum, {
          x: 275,
          y: 223,
          size: 12,
          color: rgb(0, 0, 0),
        })
      }
      if (dataSingle.hasOwnProperty("arrivalDate")) {
        // Fill in arrival day field
        currentPage.drawText(String(dataSingle.arrivalDate)[8], {
          x: 202,
          y: 200,
          size: 12,
          color: rgb(0, 0, 0),
        })
        // Fill in arrival day field
        currentPage.drawText(String(dataSingle.arrivalDate)[9], {
          x: 225,
          y: 200,
          size: 12,
          color: rgb(0, 0, 0),
        })
        // Fill in arrival month field
        currentPage.drawText(String(dataSingle.arrivalDate)[5], {
          x: 248,
          y: 200,
          size: 12,
          color: rgb(0, 0, 0),
        })
        // Fill in arrival month field
        currentPage.drawText(String(dataSingle.arrivalDate)[6], {
          x: 271,
          y: 200,
          size: 12,
          color: rgb(0, 0, 0),
        })
        // Fill in arrival year field
        currentPage.drawText(String(dataSingle.arrivalDate)[2], {
          x: 294,
          y: 200,
          size: 12,
          color: rgb(0, 0, 0),
        })
        // Fill in arrival year field
        currentPage.drawText(String(dataSingle.arrivalDate)[3], {
          x: 317,
          y: 200,
          size: 12,
          color: rgb(0, 0, 0),
        })
      }
      if (dataSingle.hasOwnProperty("departureDate")) {
        // Fill in depart day field
        currentPage.drawText(String(dataSingle.departureDate)[8], {
          x: 202,
          y: 162,
          size: 12,
          color: rgb(0, 0, 0),
        })
        // Fill in depart day field
        currentPage.drawText(String(dataSingle.departureDate)[9], {
          x: 225,
          y: 162,
          size: 12,
          color: rgb(0, 0, 0),
        })
        // Fill in depart month field
        currentPage.drawText(String(dataSingle.departureDate)[5], {
          x: 248,
          y: 162,
          size: 12,
          color: rgb(0, 0, 0),
        })
        // Fill in depart month field
        currentPage.drawText(String(dataSingle.departureDate)[6], {
          x: 271,
          y: 162,
          size: 12,
          color: rgb(0, 0, 0),
        })
        // Fill in depart year field
        currentPage.drawText(String(dataSingle.departureDate)[2], {
          x: 294,
          y: 162,
          size: 12,
          color: rgb(0, 0, 0),
        })
        // Fill in depart year field
        currentPage.drawText(String(dataSingle.departureDate)[3], {
          x: 317,
          y: 162,
          size: 12,
          color: rgb(0, 0, 0),
        })
      }
      if (dataSingle.hasOwnProperty("countriesTravelled")) {
        // Fill in countries field
        currentPage.drawText(dataSingle.countriesTravelled, {
          x: 260,
          y: 125,
          size: 12,
          color: rgb(0, 0, 0),
        })
      }
    }
      
    if(dataSingle.test == 'F2F') {
      // Fill reference no. field
      currentPage.drawText(dataSingle.bookingRef, {
        x: 220,
        y: 683,
        size: 11,
        color: rgb(0, 0, 0),
      })
      if (dataSingle.hasOwnProperty("fullName")) {
        // Fill name field
        currentPage.drawText(dataSingle.fullName, {
          x: 180,
          y: 419,
          size: 12,
          color: rgb(0, 0, 0),
        })
      }
      if (dataSingle.hasOwnProperty("address")) {
        // Fill address field
        currentPage.drawText(dataSingle.address, {
          x: 180,
          y: 396,
          size: 12,
          color: rgb(0, 0, 0),
        })
      }
      if (dataSingle.hasOwnProperty("postcode")) {
        // Fill postcode field
        currentPage.drawText(dataSingle.postcode, {
          x: 180,
          y: 370,
          size: 12,
          color: rgb(0, 0, 0),
        })
      }
      if (dataSingle.hasOwnProperty("email")) {
        // Fill email field
        currentPage.drawText(dataSingle.email, {
          x: 180,
          y: 345,
          size: 12,
          color: rgb(0, 0, 0),
        })
      }
      if (dataSingle.hasOwnProperty("mobile")) {
        // Fill number field
        currentPage.drawText(dataSingle.mobile, {
          x: 180,
          y: 320,
          size: 12,
          color: rgb(0, 0, 0),
        })
      }
      if (dataSingle.hasOwnProperty("dob")) {
        // Fill in birth day field
        currentPage.drawText(String(dataSingle.dob)[8], {
          x: 184,
          y: 280,
          size: 12,
          color: rgb(0, 0, 0),
        })
        // Fill in birth day field
        currentPage.drawText(String(dataSingle.dob)[9], {
          x: 210,
          y: 280,
          size: 12,
          color: rgb(0, 0, 0),
        })
        // Fill in birth month field
        currentPage.drawText(String(dataSingle.dob)[5], {
          x: 237,
          y: 280,
          size: 12,
          color: rgb(0, 0, 0),
        })
        // Fill in birth month field
        currentPage.drawText(String(dataSingle.dob)[6], {
          x: 263,
          y: 280,
          size: 12,
          color: rgb(0, 0, 0),
        })
        // Fill in birth year field
        currentPage.drawText(String(dataSingle.dob)[2], {
          x: 293,
          y: 280,
          size: 12,
          color: rgb(0, 0, 0),
        })
        // Fill in birth year field
        currentPage.drawText(String(dataSingle.dob)[3], {
          x: 316,
          y: 280,
          size: 12,
          color: rgb(0, 0, 0),
        })
      }
      // Fill in sex field
      var sex = dataSingle.sex
      var sexX = sex == 'Male' ? 183 : sex == 'Female' ? 250 : 345
      currentPage.drawText('X', {
        x: sexX,
        y: 252,
        size: 12,
        color: rgb(0, 0, 0),
      })
      // Fill in ethnicity field
      if (dataSingle.hasOwnProperty("ethnicity")) {
        currentPage.drawText(dataSingle.ethnicity, {
          x: 180,
          y: 218,
          size: 12,
          color: rgb(0, 0, 0),
        })
      }
      // Fill in passport field
      if (dataSingle.hasOwnProperty("idNum")) {
          currentPage.drawText(dataSingle.idNum, {
          x: 180,
          y: 186,
          size: 12,
          color: rgb(0, 0, 0),
        })
      }
    }
  }

  async function modifyPdf(data) {
    var pdfDoc = await PDFDocument.create()

    for(var i = 0; i < data.length; i++) {
      var dataSingle = data[i];
      console.log(dataSingle)
      console.log(dataSingle.test) 
      var url = selectPdf(dataSingle.test, pdfs)

      var existingPdfBytes = await fetch(url).then(res => res.arrayBuffer())
      
      // Load a PDFDocument from the existing PDF bytes
      var newPdf = await PDFDocument.load(existingPdfBytes)

      // Copy page into PDF
      var [newPage] = await pdfDoc.copyPages(newPdf, [0])
      
      // Add page to PDF
      pdfDoc.addPage(newPage)

      // Get the first page of the document
      var pages = pdfDoc.getPages()
      var currentPage = pages[i]
      fillInPdf(dataSingle, currentPage)
    }

    console.log('pages done')

    // Serialize the PDFDocument to bytes (a Uint8Array)
    var pdfBytes = await pdfDoc.save()
    
    // var pdfDataUri = await pdfDoc.saveAsBase64({ dataUri: true });
    // document.getElementById('pdf').src =  pdfDataUri;
    
    // Trigger the browser to download the PDF document
    let pdfName = "paperwork_" + dataSingle.orderId;
    download(pdfBytes, pdfName, "application/pdf");
  }
  
  modifyPdf(data)
  </script>
  </html>
  