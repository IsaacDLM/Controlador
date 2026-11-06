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
        $miembros = ['Isaac', 'Carlos', 'Anna', 'Nicole'];
        $tareas = ['Isaac - Limpiar la casa', 'Anna - Hacer la compra', 'Carlos - Sacar la basura', 'Nicole - Cocinar la cena'];

        if (!in_array($miembro, $miembros)) {
            $respuesta = $this->json(['error' => 'Acceso denegado'], Response::HTTP_NOT_FOUND);
        }else {
            $tareasMiembro = [];
            foreach ($tareas as $tarea) {
                if (strpos($tarea, $miembro) === 0) {
                    $tareasMiembro[] = $tarea;
                }
            }
            $respuesta = $this->json(['tareas' => $tareasMiembro]);
        }
        return $respuesta;
    }
}
