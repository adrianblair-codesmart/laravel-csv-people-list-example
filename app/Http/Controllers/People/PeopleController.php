<?php
namespace App\Http\Controllers\People;

use App\Person;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class PeopleController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $all = $request->all();

    $sortingOrders = [
      'firstname' => 'asc',
      'surname' => 'asc',
      'email' => 'asc'
    ];

    // requires only 1 sorting order use the name and value

    if (Input::has('sortingOrders')) {
      $tempSortingOrders = Input::get('sortingOrders');
      if ($tempSortingOrders != '') {
        $sortingOrders = $tempSortingOrders;
      }
    }

    $primarySortingType = 'firstname';

    if (Input::has('primarySortingType')) {
      $tempPrimarySortingType = Input::get('primarySortingType');
      if ($tempPrimarySortingType != '') {
        $primarySortingType = $tempPrimarySortingType;
      }
    }

    $primarySortingValue = $sortingOrders[$primarySortingType];
    unset($sortingOrders->$primarySortingType);

    $keys = array_keys($sortingOrders);

    if (Input::has('people_search')) {
      $search = Input::get('people_search');
      if ($search != '') {
        return Person::where('firstname', 'like', '%' . $search . '%')->orWhere('surname', 'like', '%' . $search . '%')
          ->orWhere('email', 'like', '%' . $search . '%')
          ->orderBy($primarySortingType, $primarySortingValue)
          ->orderBy($keys[0], $sortingOrders[$keys[0]])
          ->orderBy($keys[1], $sortingOrders[$keys[1]])
          ->paginate();
      }
    }

    // $result = $model->orderBy('name', 'asc')->orderBy('id', 'asc')->paginate(10);

    return Person::orderBy($primarySortingType, $primarySortingValue)->orderBy($keys[0], $sortingOrders[$keys[0]])
      ->orderBy($keys[1], $sortingOrders[$keys[1]])
      ->paginate();
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $person = new Person();

    // attempt validation
    $this->validate($request, $person->rules());

    // success code
    $fields = $request->only('firstname', 'surname', 'email');
    $person->fill($fields);
    $person->save();

    return $person;
  }

  /**
   * Display the specified resource.
   *
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
    return Person::findOrFail($id);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $person = Person::findOrFail($id);

    // attempt validation
    $this->validate($request, $person->rules());

    // success code
    $person = Person::findOrFail($id);
    $fields = $request->only('firstname', 'surname', 'email');
    $person->fill($fields);
    $person->save();

    return $person;
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $person = Person::findOrFail($id);
    $person->delete();

    return [
      'message' => 'Success'
    ];
  }
}
