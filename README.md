# TP Nº 1 — Liquidación de sueldos

Ing. / Lic. En Sistemas de Información | Programación  IV | Departamento: Ciencias Exactas, Físicas y Naturales. 

## Docentes: 
- Prof. Esp. Lic. Miguel Angel Molina
- JTP Lic. Cristian Alberto Oliva
- Ayudante de 1ra. Ing. Sira Yanel de la Vega
- Ayudante de 1ra. Esp. Lic. Ariel Santillán Escudero

## Integrantes:
- Peña Kevin Matías		Matr.: EISI577
- Casimiro Juan Ignacio         Matr.: EISI1439
- Brizuela Marco Ezequiel	Matr.: EISI676 	
- Pérez Valentina		Matr.: ELSI1240
- Pérez Joaquín		Matr.: EISI852


## Descripción
Microsistema en PHP que recibe una **categoría (A-D)** y una **antigüedad (1 a 30 años)**, calcula haberes, descuentos y sueldo neto, y presenta una liquidación en pantalla con Bootstrap 5.

## Requisitos
- PHP 8.0 o superior (o XAMPP con Apache/PHP).
- Navegador web. Bootstrap se carga desde un CDN; si no hay Internet, el sistema sigue funcionando con los estilos propios.

## Cómo ejecutarlo (opción 1: PHP instalado)
1. Abrir una terminal en la carpeta `TP1_Liquidacion_Sueldos`.
2. Ejecutar `php -S localhost:8000`.
3. Abrir `http://localhost:8000` en el navegador.
4. Presionar **Ctrl+C** en la terminal para detener el servidor.

## Cómo ejecutarlo (opción 2: XAMPP)
1. Copiar la carpeta `TP1_Liquidacion_Sueldos` dentro de `C:\xampp\htdocs\`.
2. Abrir el panel de XAMPP e iniciar **Apache**.
3. Abrir `http://localhost/TP1_Liquidacion_Sueldos/`.

## Escala de sueldos básicos
- A: $4050,55
- B: $3209,20
- C: $2575,73
- D: $1812,28

## Reglas de cálculo
- Antigüedad = sueldo básico × 0,10 × años.
- Presentismo = sueldo básico × 0,15.
- Dedicación especial = sueldo básico × 0,50.
- Total haberes = sueldo básico + antigüedad + presentismo + dedicación especial.
- Obra social = total haberes × 0,05.
- Aporte jubilatorio = total haberes × 0,11.
- Total descuentos = obra social + aporte jubilatorio.
- Neto = total haberes − total descuentos.

## Prueba de referencia
Ingresar **A** y **1**: total haberes **7088,4625**, total descuentos **1134,154**, neto **5954,3085**.

## Descripción del código
- El array `$sueldosBasicos` mantiene las cuatro escalas.
- El formulario HTML envía los campos por `POST` a la misma página PHP.
- La validación comprueba que la categoría exista y que la antigüedad sea un entero de 1 a 30.
- PHP calcula primero las bonificaciones desde el básico y luego los descuentos desde el total de haberes.
- Las tablas muestran cada concepto y los totales. `importe()` formatea los números con separadores argentinos y hasta seis decimales.
- Bootstrap se utiliza para el formulario, tablas y diseño adaptable; CSS adicional personaliza colores y espaciados.
- La opción **Imprimir** utiliza la función del navegador.

## Alcance académico
El enunciado no exige base de datos, usuarios, historial de liquidaciones ni exportación; por ello el sistema funciona con una sola página PHP y no almacena datos.
