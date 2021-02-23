<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\CommandRepository;
use App\Repositories\CommandproductRepository;
use App\Repositories\UserRepository;
use App\Repositories\ProductRepository;
use App\Repositories\CategorieRepository;
use App\Repositories\CartSessionRepository;

use App\Models\Product;
use App\Models\UserModel;
use App\Models\Command;
use App\Models\Commandproduct;
use App\Email;

class CommandController extends AppBaseController
{

	protected $commandRepository; 
    protected $categorieRepository;
    protected $commandproductRepository; 
    protected $userRepository;
    protected $productRepository;
    protected $cartRepository;

    public function __construct (CommandRepository $commandRepository, ProductRepository $productRepository, CommandproductRepository $commandproductRepository, UserRepository $userRepository, CategorieRepository $categorieRepository, CartSessionRepository $cartRepository) {
    	$this->commandRepository = $commandRepository;
        $this->categorieRepository = $categorieRepository;
        $this->commandproductRepository = $commandproductRepository;
        $this->userRepository = $userRepository;
        $this->productRepository = $productRepository;
        $this->cartRepository = $cartRepository;
    }

    # Affichage du panier
    public function infoscommand () {
        $categories = $this->categorieRepository->findWhere(array("status" => 1));

    	return view("customer.infos_command")->with('categories', $categories); 
    }

    # Ajout d'un produit au panier
    public function sendcommand (Request $request) {
        $info = "";

        $input = $request->all();

        //une commande est associé a un compte customer 
        $customer = $this->userRepository->findWhere(array("email" => $request->email))->first();
        if(is_null($customer)){
            $customer = $this->userRepository->create([
                "email" => $request->email
            ]);
        }

        $command = $this->commandRepository->create([
                "num_command" => $this->my_random_capital_letter().$this->my_random_number(),
                "status" => 0,
                "firstname" => $request->firstname,
                "lastname" => $request->lastname,
                "address" => $request->address,
                "city" => $request->city,
                "country" => $request->country,
                "tel" => $request->tel,
                "comment" => $request->comment,
                "user_id" => $customer->id,
            ]);

        $cart = session()->get("cart"); 
        if(is_array($cart)){
            foreach ($cart as $key => $item) {
                $commandproduct = new Commandproduct;
                $commandproduct->command_id = $command->id;
                $commandproduct->product_id = $key;
                $commandproduct->quantity = $item["quantity"];
                $commandproduct->save();
            }

            // Suppression des informations du panier en session
            $this->cartRepository->empty();

            //Envoie de mail
            $data = array('nom' => $request->firstname.' '.$request->lastname, 
                            'tel' => $request->tel, 
                            'email' => $request->email, 
                            'sujet' => 'Commande de produits...', 
                            'cart' => $cart);
            $title = 'Commande de produits';
            $destEmail = $request->email;
            $user_name = "";
            $email = new Email();
            $statut=$email->sendMailCommand($title, $data, $destEmail, $user_name);// envoie du mail
        }

        $info = "Votre commande a été transmise. Les détails vous sont envoyé par mail. Vous serez contacté pour la livraison. le payement se fait à la livraison.";
        return redirect("/")->with("info", $info);
    }

    public function commandslist(Request $request)
    {
            $commands = $this->commandRepository->all();

            //var_dump($commands[10]->commandproducts);

            return view('commands.commandslist')
                ->with('commands', $commands);
    }

    public function changedstatuscommand(Request $request)
    {   
        try{
            $command = $this->commandRepository->findWhere(array("id" => $request->idCommand))->first();
            $command->status = $request->status;
            $command->save();
        }catch(\Exception $e){

        }finally{
            return redirect('/commandslist');
        }
    }
    

}