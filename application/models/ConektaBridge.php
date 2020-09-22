<?php
require_once ("vendor/conekta/conekta-php/lib/Conekta.php");

class ConektaBridge extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        \Conekta\Conekta::setApiKey("key_Xivsx3g3yxEXc5rwkKxfoA");
        \Conekta\Conekta::setLocale('es');
    }
    // EN EL CASO DE CONEKTA, LOS CLIENTES SERÍAN LOS EMPLEADOS
    // LOS EMPLEADOS SON LOS QUE SE SUBSCRIBEN, PERO EL QUE PAGA ES EL EMPLEADOR
    //INICIO DE CLIENTES
    function crearCliente($cliente) {

        $customer = \Conekta\Customer::create(
            [
                'name'  => $cliente['name'],
                'email' => $cliente['email'],
                'phone' => $cliente['phone'],
                'payment_sources' => [
                    [
                        'token_id' => $cliente['token_id'], // el id de la tarjeta tokenizado
                        'type' => $cliente['tipoPago']
                    ]
                ]
            ]
        );
        return $customer;
    }
    function actualizarCliente($idCliente, $cliente) {
        $customer = \Conekta\Customer::find($idCliente);
        $customer->update(
            [
                'name'  => $cliente['name'],
                'email' => $cliente['email'],
                'phone' => $cliente['phone'],
            ]
        );
        return $customer;
    }
    function deleteCliente($idCliente) {
        $customer = \Conekta\Customer::find($idCliente);
        $customer->delete();
    }
    //FIN DE CLIENTES
    // INICIO DE LOS MÉTODOS DE PAGO DE LOS CLIENTES
    function crearMetodoPago($idCliente, $tipo, $token) {
        $customer = \Conekta\Customer::find($idCliente);
        $source = $customer->createPaymentSource([
            'token_id' => $token,
            'type'     => $tipo
        ]);
        return $source;
    }
    function actualizarMetodoPago($idCliente, $data) {
        $customer = \Conekta\Customer::find($idCliente);
        $customer->payment_sources[0]->update([
            'exp_month' => $data['exp_month'],
            'exp_year' => $data['exp_year'],
            'name' => $data['name'],
            'address' => $data['address']
        ]);
    }
    function deleteMetodoPago($idCliente) {
        $customer = \Conekta\Customer::find($idCliente);
        $source   = $customer->payment_sources[0]->delete();
        return $source;
    }
    // FIN DE LOS MÉTODOS DE PAGO DE LOS CLIENTES


    //INICIO DE PLANES
    function crearPlan($plan) {
        \Conekta\Plan::create([
            'id' => "Plan-".$plan['id'],
            'name' => $plan['name'],
            'amount' => $plan['amount'], // monto en centavos
            'currency' => "MXN",
            'interval' => $plan['interval'],
            'frequency' => $plan['frequency'],
            'trial_period_days' => $plan['trial_period_days'],
            'expiry_count' => $plan['expiry_count'] // cuantas veces hacerle cargos al usuario antes de que expire la subscripción
        ]);
    }
    function actualizarPlan($idPlan, $datos) {
        $plan = \Conekta\Plan::find("Plan-".$idPlan);
        $plan->update(
            [
                'id' => "Plan-".$idPlan,
                'name' => $datos['name'],
                'amount' => $datos['amount']
            ]);
    }
    function deletePlan($idPlan) {
        $plan = \Conekta\plan::find("Plan-".$idPlan);
        $plan->delete();
    }
    //FIN DE PLANES


    //INICIO DE SUBSCRIPCIONES
    function crearSubscripcion($customer, $plan, $card=null) {
        if($card) {
            $subscription = $customer->createSubscription([
                'plan' => "Plan-".$plan,
                'card' => $card['id']
            ]);
        } else
        {
            $subscription = $customer->createSubscription([
                'plan' => "Plan-".$plan
            ]);
        }
        return $subscription;
    }
    function actualizarSubscripcion($customer, $plan, $card = null) {
        if($card) {
            $subscription = $customer->subscription->update([
                'plan' => "Plan-".$plan,
                'card' => $card['id']
            ]);
        } else {
            $subscription = $customer->subscription->update([
                'plan' => "Plan-".$plan
            ]);
        }

    }
    function pausarSubscripcion($idCliente) {
        $customer = \Conekta\Customer::find($idCliente);
        $subscription = $customer->subscription->pause();
        return $subscription;
    }
    function reanudarSubscripcion($idCliente) {
        $customer = \Conekta\Customer::find($idCliente);
        $subscription = $customer->subscription->resume();
        return $subscription;
    }
    function cancelarSubscripcion($idCliente) {
        $customer = \Conekta\Customer::find($idCliente);
        $subscription = $customer->subscription->cancel();
        return $subscription;
    }
    //FIN DE SUBSCRIPCIONES

}

?>