<?php

namespace App\Http\Controllers;

//importamos la classes necesarias
use Illuminate\Support\Facades\Mail;
use App\Mail\MessageReceived;


class MessageController extends Controller
{
    //
    // en el formulario en la vista se tiene que añadir la directiv @csrf para que genere un token de seguridad


    public function store(){

        //Mas validaciones en https://laravel.com/docs/validation #Available Validation Rules

       $message = request()->validate([ //guardamos el contenido en $message solo si passa la validación

            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'content' => 'required|min:3', //minimo 3 caracteres
        ],[ //como personalizar los mensaje de error para solo este formulario
            'name.required' => __('I need your name')
        ]);


        //enviar email

        Mail::to('henry_eac@hotmail.com')->queue(new MessageReceived($message)); //definimos el destinatario, y el mailable MessageReceived que hemos creado y le pasamos el contenido del email
        //en lugar de ->send() es mejor usar ->queue() ya que es asincrono, y asi no hace falta esperar, simplemente lo pone en cola


        //return 'Mensaje enviado';
        return back()->with('status', __('Recibimos tu mensaje, te responderemos tan pronto como sea posible.'));
        //redirigimos a la web que ha hecho la petición, en este caso el formulario
        //with() recibe 2 parametros, la llave de un array y el valor

        //request('email').' '.request('name')



        //return  request();
    }

}
