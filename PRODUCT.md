# Product

<!-- impeccable:product-schema 1 -->

## Platform

web

## Users

Dos audiencias confirmadas, con trabajos distintos sobre la misma superficie:

1. **Cliente nuevo que evalúa.** Persona física o empresa en Puebla que busca notario para un acto (compraventa, poder, acta constitutiva, testamento). Llega sin relación previa, compara servicios y decide si contactar. Su trabajo: entender qué hace la notaría, confirmar que es legítima y competente, y agendar una cita o pedir cotización. Rutas: `/` (index), `/services_catalog`, `/us`, `/contact`.
2. **Cliente activo con expediente.** Otorgante que ya está en trámite y entra por una liga tokenizada que le comparte el personal de la notaría. Su trabajo: validar su identidad por RFC, registrarse si no existe, vincularse al expediente y subir documentación. Ruta: `/expediente/vincular/{token}` (wizard de 3 pasos con proxy AJAX al ERP).

Audiencia secundaria: denunciantes que usan el buzón de reportes (`/mailbox_complaints`), y el personal de la notaría que genera y comparte las ligas de cotización y expediente.

## Product Purpose

Cara pública de la Notaría Pública Número 4 del Distrito Judicial de Puebla. Cumple dos funciones que normalmente viven en productos separados: captar y convertir clientes nuevos (agenda de cita, catálogo de servicios, cotización por liga), y servir como puerta de enlace autenticada para que clientes en trámite alimenten su expediente digital sin que el personal capture por ellos. El éxito son citas agendadas y expedientes vinculados con documentación completa.

## Positioning

No es un sitio de despacho genérico: está conectado al ERP notarial interno (`erp-frontend` / `erp-backend`). La liga de expediente y la de cotización son emitidas por el ERP y consumidas aquí, de modo que lo que el cliente sube o valida entra directo al flujo de trámite y a la evaluación de cumplimiento PLD. Un sitio de marketing convencional no puede recibir un otorgante y devolverlo al expediente.

## Operating Context

- **Entorno legal de alto riesgo.** Los actos notariales son irreversibles y sujetos a la Ley del Notariado del Estado de Puebla y a LFPIORPI (PLD). El tono público debe proyectar certeza jurídica, no promesas comerciales.
- **Entrada por liga, no por login.** El cliente activo no tiene cuenta: el token en la URL es la credencial. La pantalla de token inválido es un estado de primera clase, no un borde.
- **Carga documental en condiciones reales.** Fotos de identificaciones desde celular, conexiones lentas, usuarios que no distinguen "RFC" de "CURP". El wizard es la superficie de mayor riesgo de abandono del producto.
- **Público hispanohablante de Puebla.** Todo el contenido es español mexicano; el registro es de usted.

## Capabilities and Constraints

**Capacidades**
- Agenda de cita desde el index (`POST /contact/cite`) y formulario de contacto (`POST /contact/create`).
- Catálogo de servicios y operaciones servido desde `ServicesController` (acordeón de dos niveles).
- Cotización pública validada por token: `/services/quote/{token}/{quoteId}`.
- Buzón de quejas y reportes (`POST /mailbox_complaints/create`).
- Wizard de vinculación de expediente: verificación de RFC, alta de otorgante, vinculación y carga de documentos, todo vía endpoints AJAX que hacen proxy al ERP.

**Restricciones técnicas**
- Laravel + Blade. Un solo layout (`resources/views/template/layout.blade.php`) para todas las vistas.
- Bootstrap 4.3.1 y Popper por CDN. No hay framework de UI ni build de componentes.
- **La fuente de verdad del CSS es `public/css/`.** El layout carga `asset('css/...')`, no `@vite`. `resources/css/` y su entrada en `vite.config.js` existen pero no alimentan la página servida, y ya divergieron. Editar `resources/css/` no tiene efecto visible.
- **El sitio no tiene JavaScript propio, con una excepción.** `public/js/` no existe: los diez `asset('js/...')` que cargaba el layout devolvían 404 (`main.js`, AOS, Owl Carousel, Fancybox, `jquery.sticky`, `jquery.waypoints`, `animateNumber`, `easing`, y las copias locales de jQuery y Popper). Fueron retirados del layout. Lo que sí carga: jQuery slim, Popper y Bootstrap 4 desde CDN.
  La excepción es el wizard de expediente: `expediente_link.blade.php` usa `@vite(['resources/js/expediente-link.js'])` y esa ruta **sí resuelve** — `public/build/manifest.json` existe y mapea el archivo. Es el único JavaScript propio del producto, y la vista está acoplada a sus `id`; cambiarlo exige `npm run build` y commit de `public/build/`.
  Consecuencia de diseño: todo lo demás debe funcionar con CSS puro, con el JS propio de Bootstrap 4 (collapse, tabs, modal) o con controles nativos de HTML.
- Iconografía por fuentes de icono (icomoon, flaticon), no SVG.
- Sin modo oscuro. El ERP sí lo tiene (`body.dark-theme`); la landing no lo hereda.

**Terminología del dominio** (usar tal cual, no traducir ni suavizar): otorgante, expediente, trámite, acto notarial, fedatario, testimonio, certeza jurídica, RFC, CURP.

## Brand Commitments

- **Nombre y titular:** "Notaría Pública Número 4", Distrito Judicial de Puebla, residencia en la Ciudad de Puebla, fundada en 2004. Titular: Mtra. Norma Romero Cortés (nombramiento publicado el 23 de noviembre de 2009). Auxiliar: Lic. Norma Alma Cortés Caballero. Nombres y cargos son hechos registrales: no se editorializan ni se abrevian.
- **Logotipo:** `public/images/logo.png`, usado también como favicon.
- **Continuidad de marca con el ERP.** La landing y `erp-frontend` son la misma marca en distinto registro. Comparte los tokens de color y tipografía del ERP (`erp-frontend/DESIGN.md`); no comparte su densidad ni su vocabulario de componentes. Esta decisión es vinculante y está detallada en `DESIGN.md`.
- **Voz:** formal, de usted, sin superlativos comerciales. "Certeza jurídica" es la promesa, no "el mejor servicio".

## Evidence on Hand

- Retratos reales de ambas fedatarias: `public/images/maestra_norma.png`, `maestra_norma_cortes.png`, `norma.png`.
- Imagen de portada del hero: `public/images/portada1.jpg` (y `portada.png`).
- Catálogo de servicios en PDF: `public/files/services_notary.pdf`.
- Domicilio verificable: Circuito Juan Pablo II 3117, Colonia Las Ánimas, Puebla.
- Facebook institucional (único canal social activo; los enlaces a Instagram, Twitter y LinkedIn están comentados en el layout porque esas cuentas no existen).
- **Ausencias que no se deben inventar:** no hay testimonios de clientes, ni casos de éxito, ni métricas de trámites, ni certificaciones ISO nombradas, ni tabulador de precios público. La "Política de Calidad" del index es un texto institucional, no una acreditación externa.

## Product Principles

1. **La certeza se demuestra, no se afirma.** Nombres, nombramientos, fechas de publicación oficial y domicilio hacen más por la confianza que cualquier adjetivo.
2. **Dos velocidades, una marca.** Evaluar es lento y con aire; completar el expediente es rápido y sin distracción. La misma identidad debe servir a ambos sin que el wizard se vuelva marketing ni el index se vuelva formulario.
3. **El token es el usuario.** Todo lo que dependa de la liga tokenizada debe fallar de forma legible: si el token es inválido, el visitante tiene que entender qué pasó y a quién pedirle otra liga.
4. **El expediente no se pierde por la interfaz.** Cada paso del wizard preserva lo capturado y nombra el error concreto. Un abandono aquí devuelve trabajo manual a la notaría.
5. **Nada de lo que se publique puede contradecir al ERP.** El sitio es la superficie pública de un sistema con estado real; el copy no promete tiempos, precios ni resultados que el trámite no garantice.

## Accessibility & Inclusion

Público general adulto, incluido adulto mayor, resolviendo asuntos patrimoniales de alto valor, muchas veces desde celular. El cuerpo de texto no baja de 1rem y los objetivos táctiles del wizard no bajan de 44px. Contraste mínimo AA (4.5:1 en texto normal, 3:1 en texto grande) es obligatorio sobre las superficies fotográficas del hero, donde hoy vive el mayor riesgo.
