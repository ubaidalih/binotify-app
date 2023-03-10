<?php
    class Addsubscription extends Controller{
        public function index(){
            if(isset($_POST['creator_id']) && isset($_POST['subscriber_id'])){
                $wsdl   = 'http://localhost:3060/binotify-soap-service/subscription?wsdl';
                $client = new SoapClient($wsdl, array('trace'=>1));  // The trace param will show you errors
                
                $creator_id = $_POST['creator_id'];
                $subscriber_id = $_POST['subscriber_id'];

                // web service input param
                $request_param = array(
                    'arg0' => $creator_id,
                    'arg1' => $subscriber_id,
                    'arg2' => "APP_KEY_SECRET"
                );
                try {
                    $response_param = $client->addSubscript($request_param);
                    $response = json_decode(json_encode($response_param),true);
                } catch (Exception $e) { 
                    echo $e->getMessage(); 
                }
            }
            $result = $this->model("Subscription")->addSubscription($creator_id,$subscriber_id);

            $list_of_penyanyi = $this->model("Penyanyi")->get_penyanyi(1);
            $this->view('daftarpenyanyi/index',$list_of_penyanyi);

        }
    }
?>