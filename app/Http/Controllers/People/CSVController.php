<?php
namespace App\Http\Controllers\People;

use App\Person;
use App\Http\Controllers\Controller;
use App\Http\Requests\People\StoreCSVRequest;

/**
 * Class CSVController
 *
 * @package App\Http\Controllers\People
 *
 */
class CSVController extends Controller
{

  public function store(StoreCSVRequest $request)
  {
    // Get uploaded CSV file
    $file = $request->file('csv');

    $handle = fopen($file, "r");
    $header = true;

    while ($csvLine = fgetcsv($handle, 1000, ",")) {

      if ($header) {
        $header = false;
      } else {
        Person::create([
          'firstname' => $csvLine[0],
          'surname' => $csvLine[1],
          'email' => $csvLine[2]
        ]);
      }
    }
  }
}