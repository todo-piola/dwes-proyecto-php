<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../model/funciones_test.php';

class ProyectoTest extends TestCase
{
    protected function setUp(): void
    {
        $_SESSION = [];
    }

    /** @test */
    public function usuario_no_autenticado_no_tiene_sesion()
    {
        $this->assertFalse(usuarioAutenticado());
    }

    /** @test */
    public function usuario_autenticado_tiene_sesion()
    {
        $_SESSION['usuario'] = 'juan';
        $this->assertTrue(usuarioAutenticado());
    }

    /** @test */
    public function usuario_admin_es_detectado_correctamente()
    {
        $_SESSION['rol'] = 'admin';
        $this->assertTrue(esAdmin());
    }

    /** @test */
    public function usuario_normal_no_es_admin()
    {
        $_SESSION['rol'] = 'usuario';
        $this->assertFalse(esAdmin());
    }

    /** @test */
    public function carrito_vacio_no_tiene_cursos()
    {
        $cursos = [];
        $this->assertFalse(carritoTieneCursos($cursos));
    }

    /** @test */
    public function carrito_con_cursos_devuelve_true()
    {
        $cursos = [
            ['id_curso' => 1, 'nombre_curso' => 'PHP']
        ];

        $this->assertTrue(carritoTieneCursos($cursos));
    }
}
