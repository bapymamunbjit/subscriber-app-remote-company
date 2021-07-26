<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Key;
use DateTime;

class SubscribersController extends BaseController
{

  public function index() 
  {
    return view('subscribers.index');
  }

  public static function getKey() 
  {
    $keyData = Key::first()->toArray();
    $key = $keyData['key'];
    return $key;
  }

  public function getSubscribersData()
  {
    
    $key = self::getKey();
    $subscribersApi = (new \MailerLiteApi\MailerLite($key))->subscribers();
    $subscribers = $subscribersApi->get()->toArray();

    $data = [];
    foreach($subscribers as $key=>$val) {
      
      $item = (object)[];
      $item->id = $val->id;
      $item->name = $val->name;
      $item->email = $val->email;
      $country = "";
      foreach($val->fields as $field) {
        if ($field->key == "country") {
          $country = $field->value;
          break;
        }
      }
      $item->country = $country;
      $item->subscription_date = date_format( date_create($val->date_created),"d/m/Y") ;
      $item->subscription_time = date_format( date_create($val->date_created),"H:i") ;
      array_push($data, $item);
    }
    //dd($data);
    return json_encode($data);
  }

  //Function to save subscriber
  public function save(Request $request) 
  {
    $validated = $request->validate([
      'email' => 'required|email',
      'name' => 'required',
      'country' => 'required',
    ]);

    $key = self::getKey();

    $data = $request->all();
    $subscribersApi = (new \MailerLiteApi\MailerLite($key))->subscribers();
    $subscriber = [
      'email' => $data['email'],
      'name' => $data['name'],
      'fields' => [
        'country' => $data['country']
      ]
    ];

    $addedSubscriber = $subscribersApi->create($subscriber);
    return $addedSubscriber;
  }

  //Function to update subscriber
  public function update(Request $request) 
  {
    $validated = $request->validate([
      'email' => 'required|email',
      'name' => 'required',
      'country' => 'required',
    ]);

    $key = self::getKey();

    $data = $request->all();
    $subscribersApi = (new \MailerLiteApi\MailerLite($key))->subscribers();

    $subscriberData = [
      'fields' => [
        'name' => $data['name'],
        'country' => $data['country']
      ]
    ];

    $subscriber = $subscribersApi->update($data['email'], $subscriberData);
    return $subscriber;
  }

  //Function to update subscriber
  public function delete(Request $request) 
  {
    $key = self::getKey();
    $data = $request->all();
    $ML_Subscribers = (new \MailerLiteApi\MailerLite($key))->subscribers();
    $ML_Subscribers->delete( $data['email'] );
    return json_encode(["message" => "Subscriber Deleted"]);
  }
}