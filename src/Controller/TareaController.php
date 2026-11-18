<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class TareaController extends AbstractController
{
    #[Route('/tarea/{miembro}', name: 'app_tarea')]
    public function index(string $miembro): Response
    {
        $miembros = ['Isaac', 'Anna', 'Claudia', 'Nicole'];
        $tareas = [
            'Isaac' => ['Estudiar symfony para el examen'],
            'Anna' => ['Preparar la clase de matematicas'],
            'Claudia' => ['Repasar la unidad 4 del libro de Ingles'],
            'Nicole' => ['Enviar el inventario del mes'],
        ];

        $autorizado = false;
        foreach ($miembros as $personas ) {
            if ($personas === $miembro) {
                $autorizado = true;
            }
        }
        if($autorizado) {
            $mensaje = "Tareas de {$miembro}<br>";
            foreach ($tareas[$miembro] as $tarea) {
                $mensaje .= " {$tarea}<br>";
            }
            $respuesta = new Response($mensaje);
        }else{
            $respuesta = new Response("Aceeso denegado");
        }
            return $respuesta;
    }
}
