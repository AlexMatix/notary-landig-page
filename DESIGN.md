---
name: Notaría 4 — Sitio Público
description: La antesala pública de la Notaría 4 — misma marca que el ERP notarial, en registro de recepción
colors:
  primary-navy: "#0d2b3e"
  navy-deep: "#071a28"
  navy-mid: "#2c465a"
  navy-hover: "#1a4966"
  accent-gold: "#dfc356"
  accent-gold-dark: "#d2ae3c"
  brass: "#9a842a"
  ink-slate: "#364d59"
  ink-soft: "#5b7784"
  canvas: "#f4f7f6"
  surface-white: "#ffffff"
  surface-muted: "#f8f9fa"
  hairline-navy: "rgba(13, 43, 62, 0.12)"
  hairline-navy-strong: "rgba(13, 43, 62, 0.18)"
  hairline-onnavy: "rgba(255, 255, 255, 0.16)"
  danger-red: "#dc3545"
  hero-scrim-strong: "rgba(13, 43, 62, 0.78)"
  hero-scrim-weak: "rgba(13, 43, 62, 0.06)"
typography:
  display:
    fontFamily: "'Playfair Display', 'Iowan Old Style', Georgia, serif"
    fontSize: "clamp(2.25rem, 1.583rem + 2.963vw, 4.25rem)"
    fontWeight: 700
    lineHeight: 1.05
    letterSpacing: "-0.015em"
  headline:
    fontFamily: "'Playfair Display', 'Iowan Old Style', Georgia, serif"
    fontSize: "clamp(1.625rem, 1.375rem + 1.111vw, 2.375rem)"
    fontWeight: 400
    lineHeight: 1.18
    letterSpacing: "-0.008em"
  title:
    fontFamily: "Inter, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif"
    fontSize: "clamp(1.125rem, 1.083rem + 0.185vw, 1.25rem)"
    fontWeight: 600
    lineHeight: 1.35
  lede:
    fontFamily: "Inter, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif"
    fontSize: "clamp(1.0625rem, 0.979rem + 0.370vw, 1.3125rem)"
    fontWeight: 400
    lineHeight: 1.55
  body:
    fontFamily: "Inter, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif"
    fontSize: "1rem"
    fontWeight: 400
    lineHeight: 1.7
  label:
    fontFamily: "Inter, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif"
    fontSize: "0.8125rem"
    fontWeight: 600
    lineHeight: 1.3
    letterSpacing: "0.11em"
  icon:
    fontFamily: "icomoon, flaticon"
    fontSize: "28px"
rounded:
  sm: "4px"
  md: "8px"
  lg: "12px"
  pill: "30px"
  full: "999px"
spacing:
  card: "clamp(1.5rem, 1.167rem + 1.481vw, 2.5rem)"
  section: "clamp(4rem, 2.833rem + 5.185vw, 7.5rem)"
  section-tight: "clamp(2.5rem, 2rem + 2.222vw, 4rem)"
  navbar: "0.875rem 1rem"
components:
  button-primary:
    backgroundColor: "{colors.accent-gold}"
    textColor: "{colors.primary-navy}"
    rounded: "{rounded.md}"
    padding: "0.9375rem 2.25rem"
    height: "44px"
  button-primary-hover:
    backgroundColor: "{colors.accent-gold-dark}"
    textColor: "{colors.primary-navy}"
  button-nav:
    backgroundColor: "transparent"
    textColor: "{colors.surface-white}"
    rounded: "{rounded.full}"
    padding: "0.625rem 1.5rem"
    height: "44px"
  button-nav-hover:
    backgroundColor: "{colors.surface-white}"
    textColor: "{colors.primary-navy}"
  card-executive:
    backgroundColor: "{colors.surface-white}"
    rounded: "{rounded.lg}"
    padding: "{spacing.card}"
  input-field:
    backgroundColor: "{colors.surface-white}"
    textColor: "{colors.ink-slate}"
    rounded: "{rounded.md}"
    height: "55px"
    padding: "0 1rem"
  nav-link:
    textColor: "{colors.surface-white}"
    typography: "{typography.label}"
  nav-link-hover:
    textColor: "{colors.accent-gold}"
  medallion:
    backgroundColor: "{colors.primary-navy}"
    textColor: "{colors.accent-gold}"
    rounded: "{rounded.full}"
    size: "68px"
  proof-band:
    backgroundColor: "{colors.primary-navy}"
    textColor: "{colors.surface-white}"
    padding: "{spacing.section}"
  tramite-card:
    backgroundColor: "{colors.surface-white}"
    textColor: "{colors.primary-navy}"
    rounded: "{rounded.lg}"
    padding: "1.5rem"
---

# Design System: Notaría 4 — Sitio Público

## Overview

**Creative North Star: "The Notarial Antechamber"**

Este sitio es la antesala de la notaría, no el despacho. El visitante llega con un asunto patrimonial serio y todavía no sabe si confiar; lo que lo convence es un recibidor sobrio, bien iluminado y con materiales nobles, donde alguien lo espera con nombre y apellido. De ahí el aire entre bloques, la fotografía real de las fedatarias y del edificio, el navy profundo como estructura y el oro apareciendo poco —en el botón, en el subrayado del menú, en el trazo bajo el nombre— como el latón de una placa.

La relación con `erp-frontend` es explícita: **misma marca, distinto registro.** Los tokens de color y las familias tipográficas son los del ERP ("The Luxury Legal Sanctuary"); lo que no cruza es su densidad. El ERP existe para operar cientos de registros por día y por eso apila tablas, badges semánticos y chips de auditoría. Aquí una sola decisión importa por pantalla: contactar, entender un servicio, o dar el siguiente paso del expediente. La consecuencia práctica es que el vocabulario de estado del ERP (`.o2c-badge`, `.notary-audit-chip`, `.o2c-count-chip`, las filas `pld-row--*`) **no tiene ninguna contraparte aquí y no debe portarse**: ese lenguaje comunica cumplimiento legal a personal capacitado, y en público sólo produce ansiedad.

Lo premium aquí no es un efecto, es precisión: alineación óptica, una escala tipográfica real, espacio en blanco disciplinado, hairlines que se ven, el acento metálico racionado, fotografía tratada con intención, y un solo momento animado en lugar de movimiento espolvoreado. La confianza se produce por cuidado evidente.

**Key Characteristics:**
- Navy como estructura, oro como acento escaso, blanco como superficie de lectura.
- Fotografía real de las personas y del edificio; cero ilustración genérica, stock ni imagen de archivo.
- Playfair Display para lo que la notaría *es*; Inter para todo lo que el visitante *hace*.
- Plano en reposo. La profundidad responde a controles, nunca a contenedores.
- Un solo elemento animado en todo el sitio.
- Sin modo oscuro. El ERP lo tiene; este sitio no lo hereda.

## Colors

Paleta heredada del ERP, aplicada con el doble de aire y la mitad de acentos: el navy hace la estructura, el oro aparece raramente y todo lo demás es blanco y lienzo.

### Primary
- **Notary Navy** (`#0d2b3e`): la columna vertebral. Barra de navegación, banda de acreditación, pie de página, títulos, texto sobre superficie clara, y el velo del hero en versión translúcida. Es el mismo `primary-navy` de `erp-frontend`, sin desviación.
- **Navy Mid** (`#2c465a`) / **Navy Hover** (`#1a4966`) / **Navy Deep** (`#071a28`): escalera de profundidad para chrome estructural. Nunca semántica.

### Secondary
- **Accent Gold** (`#dfc356`): el latón de la placa. Fondo del botón primario, subrayado del menú activo, la Rúbrica del hero, el glifo del medallón y las reglas sobre navy. Es el `accent-gold` del ERP.
- **Accent Gold Dark** (`#d2ae3c`): estado hover y active del botón primario. Sobre superficie clara no alcanza contraste de texto (2.13:1); su papel es de relleno, no de tinta.
- **Brass** (`#9a842a`): oro en sombra. Es el paso 2 de la rampa tonal de `accent-gold`, no un color nuevo. A 3.68:1 sobre blanco cumple el 3:1 que WCAG pide para gráficos no textuales, y por eso es el único tono metálico que puede hacer trabajo de línea sobre fondo claro. **Sólo reglas y marcas de lista. Nunca texto.**

### Neutral
- **Ink Slate** (`#364d59`): cuerpo de texto. Un gris azulado, no negro: baja el contraste lo justo para leer párrafos largos sin dureza.
- **Ink Soft** (`#5b7784`): texto secundario, ayudas de formulario, marcadores de posición. 4.75:1 sobre blanco. Sustituye al `#6c757d` de Bootstrap, que no tiene nada de navy y desafinaba sobre un lienzo cálido.
- **Warm Canvas** (`#f4f7f6`): banda alterna de sección. Blanco roto con una gota de verde.
- **Surface White** (`#ffffff`): superficie por defecto de sección y de tarjeta.
- **Hairline Navy** (`rgba(13,43,62,0.12)` y `0.18`): borde de tarjeta y de control. El borde es navy diluido, nunca gris neutro — es lo que mantiene la tarjeta dentro de la marca cuando no hay color.

### Tertiary
- **Danger Red** (`#dc3545`): único color de error del sitio. Vive en la pantalla de token inválido y en la validación de formularios.

### Named Rules

**La Regla del Oro Escaso.** El oro es un metal, no un color de relleno. Aparece como máximo en tres elementos por viewport: la acción principal, el indicador de navegación activa y un acento estructural. En cuanto una cuarta cosa se pone dorada, el oro deja de señalar y empieza a decorar.

**La Regla del Oro Sobre Oscuro.** El oro sólo carga texto sobre navy o sobre fotografía con velo (`#dfc356` sobre `#0d2b3e` = 8.43:1). Sobre blanco no llega ni a 2:1, y `accent-gold-dark` tampoco (2.13:1). Sobre superficie clara el texto es navy y el metal se degrada a relleno, borde o subrayado; si hace falta una línea metálica sobre fondo claro, es Brass. Un `color: #dfc356` sobre superficie clara es un bug de contraste, no una decisión de marca.

**La Regla de la Semántica Ausente.** La Regla de Semántica Absoluta del ERP (rojo = bloqueo, oro = pendiente, verde = verificado) **no aplica aquí**, porque este sitio no muestra estado de cumplimiento. El oro es acento de marca, no "pendiente"; no hay verdes ni rojos semánticos, y las clases `text-success`, `btn-outline-danger`, `badge-success` y `alert-warning` de Bootstrap están remapeadas a la paleta.

## Typography

**Display / Headline:** Playfair Display (con Iowan Old Style, Georgia y serif de respaldo) — cargada en 400 y 700, y sólo esos dos pesos existen.
**Interface / Body:** Inter (con la pila del sistema de respaldo) — cargada en 400, 500, 600 y 700.
**Iconografía:** icomoon y flaticon, autoalojadas en `public/fonts/`. Los glifos se dimensionan por `font-size` y siguen su propia escala, no la del texto.

**Character:** Una serif de transición alta contra una grotesca neutral. Playfair pone la voz institucional —el nombre de la notaría, los títulos de sección, los nombres de las fedatarias— y firma la parte que se lee como documento público. Inter hace todo el trabajo operativo: párrafos, etiquetas, campos, botones y los tres pasos del wizard.

### Hierarchy
- **Display** (Playfair 700, `clamp(2.25rem → 4.25rem)`, `1.05`, `-0.015em`): el título de cada portada. Uno por página, máximo `17ch`.
- **Headline** (Playfair 400, `clamp(1.625rem → 2.375rem)`, `1.18`, `-0.008em`): títulos de sección y nombres de las fedatarias.
- **Title** (Inter 600, `clamp(1.125rem → 1.25rem)`, `1.35`): pasos del wizard, encabezados de formulario, títulos de tarjeta del catálogo.
- **Lede** (Inter 400, `clamp(1.0625rem → 1.3125rem)`, `1.55`, máximo `46ch`): el párrafo bajo el display.
- **Body** (Inter 400, `1rem`, `1.7`, máximo `68ch`): párrafos y contenido general, con `hyphens: auto`.
- **Label** (Inter 600, `0.8125rem`, `0.11em`, versalitas): cargos, enlaces de menú, cabeceras de la banda de acreditación.

### Named Rules

**La Regla de la Serif Institucional.** Playfair es para lo que la notaría *es* —su nombre, sus titulares, el encabezado de una sección—. Nunca para lo que el visitante *hace*: ningún botón, etiqueta de campo, mensaje de error ni paso de wizard lleva serif. La regla está implementada como selector, no como disciplina: todo `h1`–`h6` dentro de un `form` o del wizard cae a Inter automáticamente.

**La Regla del Peso Real.** Sólo se diseñan pesos que el `<link>` de fuentes carga: Playfair 400/700, Inter 400/500/600/700. `font-weight: 300` y `font-weight: 1000` eran declaraciones muertas que el navegador saturaba en silencio. `font-synthesis: none` impide que el fallback Georgia finja una negrita que no tiene.

**La Regla de la Medida.** El cuerpo de texto se corta en `68ch` y parte sílabas. El español justificado sin partición produce ríos de espacio; en este sitio el texto va alineado a la izquierda, y el atributo `align="justify"` heredado de la plantilla está neutralizado por CSS.

## Layout

Rejilla de Bootstrap 4.3.1 (contenedor de 12 columnas, breakpoints `sm 576` / `md 768` / `lg 992` / `xl 1200`). El sitio no define su propia rejilla y no debe hacerlo.

El ritmo vertical viene de un solo token: `--n4-section` (`clamp(4rem → 7.5rem)`), con `--n4-section-tight` para bandas comprimidas. Antes el ritmo era un accidente de utilidades apiladas (`mb-5 pb-5` sobre el padding de sección, produciendo 176px en un punto y 80px en el resto).

El bandeo alterna **blanco y `#f4f7f6`**. La alternancia anterior era `#f4f7f6` contra `#f8f9fa` — dos puntos de diferencia, invisible.

El hero es `min(90svh, 800px)` con piso de `560px`, anclado abajo: `justify-content: flex-end`. Se usa `svh` y no `vh` porque `100vh` en Safari de iOS mide el viewport más grande y empuja el CTA bajo el pliegue en la primera pintura. El encuadre de la fotografía se fija en `58% 50%` para que el letrero del edificio y el número 3117 de la fachada queden a la vista, y el texto ocupa `col-lg-7` para no taparlos.

El wizard de expediente rompe el patrón a propósito: una sola columna centrada de `46rem` como máximo, para que no haya nada más que mirar mientras se captura.

**La Regla de una Decisión por Pantalla.** Cada sección propone una sola acción. Si aparece un segundo botón que compite con el primero, la sección se parte en dos. Es la razón por la que el botón de la barra de navegación cedió su oro.

## Elevation & Depth

Híbrido, con la superficie plana como estado de reposo. Las tarjetas se separan del lienzo por el contraste blanco/`#f4f7f6` y un hairline navy visible, no por sombra.

Toda sombra lleva **dos capas** —una de contacto, corta y cerrada, y una de ambiente, ancha y difusa— porque una sola capa de desenfoque es el indicio más fiable de CSS de plantilla. Y toda sombra va teñida de navy: el negro puro sólo sobrevive en reglas heredadas que ya no se renderizan.

### Shadow Vocabulary
- **Raise** (`0 1px 2px rgba(13,43,62,.06), 0 2px 6px rgba(13,43,62,.05)`): reposo elevado de contenedores de medios, panel del wizard.
- **Lift** (`0 4px 10px rgba(13,43,62,.06), 0 14px 30px rgba(13,43,62,.10)`): reservada; ningún contenedor la usa en reposo.
- **Float** (`0 8px 16px rgba(13,43,62,.07), 0 26px 52px rgba(13,43,62,.12)`): retratos de las fedatarias.
- **Gold Glow** (`0 2px 6px rgba(154,132,42,.22), 0 8px 20px rgba(210,174,60,.28)`): hover del botón primario. Única sombra de color del sistema, y va anclada en Brass para que lea como sombra propia del botón y no como mancha.
- **On Photo** (`0 2px 4px rgba(4,18,27,.24), 0 14px 34px rgba(4,18,27,.30)`): el CTA sobre el hero. Teñida con el paso más oscuro de la rampa navy, nunca negro.
- **Hero Scrim**: dos gradientes navy en un solo elemento — uno vertical que sostiene la banda de texto y otro diagonal que deja respirar la esquina superior derecha, donde está la señalética del edificio.

### Named Rules

**La Regla de la Sombra Teñida.** Toda sombra sobre una superficie de marca lleva navy, no negro puro.

**La Regla del Reposo Plano.** Una tarjeta en reposo no tiene sombra, y **no responde al hover**. La elevación responde a *controles* —un enlace, un botón, un disparador de divulgación—, nunca a contenedores. Un mapa, un visor de PDF o una tarjeta institucional que se levanta al pasar el cursor es una afordancia que miente.

**La Regla de la Doble Capa.** Ninguna sombra nueva se declara con un solo `box-shadow`. Contacto más ambiente, o no es sombra.

## Shapes

Lenguaje de esquina suave pero contenido: `8px` es el radio por defecto —botones, campos, contenedores internos— y `12px` el de tarjetas, retratos y contenedores de medios, que necesitan leerse como objetos. El píldora (`999px`) queda reservado al botón de la barra y a las pastillas de categoría del catálogo; el círculo completo, al medallón de sección y a los numerales del wizard.

Los bordes son de `1px` y siempre navy diluido.

**La Regla de los Dos Radios.** `8px` para lo que se opera, `12px` para lo que se mira. Un tercer radio en una superficie nueva es deriva, salvo los dos casos píldora ya documentados.

**La Regla del Borde Sin Pestaña.** Ningún borde de color de más de 1px en tarjetas, listas, alertas o callouts. Una pestaña de acento a la izquierda es decoración de plantilla; el estado se comunica con tinte de fondo y borde completo de 1px.

## Components

Refinados y contenidos: el sitio prefiere el borde nítido y la transición corta sobre cualquier gesto llamativo. Toda transición de estado es de `200ms`.

### Buttons
- **Shape:** esquina suave (`8px`), altura mínima `44px`.
- **Primary** (`.btn.btn-primary`): fondo oro con texto navy (8.43:1), peso 600, padding `0.9375rem 2.25rem`.
- **Hover / Focus:** el fondo baja a oro oscuro —un cambio **visible**, que antes no existía porque un `!important` fijaba el reposo en el mismo tono del hover— y aparece el Gold Glow.
- **Active:** mismo fondo, sombra interior. Bootstrap pintaba este estado en blanco sobre oro (2.13:1) con borde azul; la regla del sistema tiene más especificidad y lo impide.
- **Nav** (`.btn-executive-nav`): fantasma en píldora, borde blanco al 42%, texto blanco. Al hover se invierte a fondo blanco con texto navy.
- **Semánticos de Bootstrap** (`btn-outline-secondary/danger/success`): remapeados a navy fantasma. La única excepción es la acción terminal del wizard, que toma el oro para no ser el elemento más débil de su pantalla.

### Cards / Containers
- **Corner Style:** `12px`. **Border:** `1px solid rgba(13,43,62,0.12)`. **Background:** blanco. **Padding:** `clamp(1.5rem → 2.5rem)`.
- **Sin sombra y sin transformación en reposo ni en hover.**
- Cinco papeles con la misma geometría y distinta densidad: `--institutional` (alineada a la izquierda), `--form` (borde más marcado y título con regla inferior), el panel del wizard (`46rem` máximo, Raise), `--media` (padding cero, `overflow: hidden`, `translateZ(0)` para que el radio recorte el `<iframe>` en Safari) y `--operation` (compacta, para el catálogo).

### Inputs / Fields
- **Style:** fondo blanco, alto fijo `55px`, radio `8px`, `font-size: 1rem` — 16px evita el zoom automático de iOS al enfocar.
- **Hover:** sólo oscurece el borde. Antes hover y foco producían el mismo halo, así que apuntar a un campo se veía igual que estar dentro de él.
- **Focus:** borde navy más halo dorado de 3px más anillo navy de 4px. El navy carga el 3:1 que pide WCAG 2.4.11; el oro carga la marca.
- **Disabled / readonly:** fondo `#eef1f3`. Un `background: #fff !important` heredado hacía que el campo RFC de sólo lectura del wizard pareciera perfectamente editable.
- **Labels:** obligatorias y asociadas por `for`. El marcador de posición no es una etiqueta: desaparece al escribir.

### Navigation
- **Barra:** navy sólido, absoluta sobre el hero. En lugar de sombra lleva un hairline interior y una caída de 44px de navy a transparente: la barra termina, no se corta.
- **Enlaces:** Inter 500, versalitas, blancos.
- **Hover / Active:** texto en oro y subrayado dorado de 2px que crece con `transform: scaleX()` — compositable, sin paso de layout.
- **Móvil:** menú fuera de lienzo, `visibility: hidden` mientras está cerrado para que no sea tabulable, y ausente por completo desde `lg`.

### Section Icon Medallion
Glifo dorado de `28px` centrado en un disco navy de `68px`. Encabeza cada tarjeta institucional.

### Proof Band
Banda navy a ancho completo con una regla dorada de 48px, un `<dl>` de cuatro hechos registrales en columnas y el párrafo del nombramiento debajo, separado por hairline. Blanco sobre navy: 14.5:1 garantizado, sin depender de ninguna fotografía. Presupuesto de oro de la banda: **un** elemento.

### Trámite Card
Enlace-tarjeta de dos líneas: nombre de la categoría en Inter 600 y una acción en versalitas navy. Es el único bloque tipo tarjeta que **sí** responde al hover, porque es un enlace y no un contenedor.

### Wizard Step Indicator
Tres pasos en fila, numeral circular, subrayado dorado bajo el paso activo. Se incluye dentro de cada panel con su paso ya marcado, en lugar de una sola vez en la cabecera: así el JavaScript que revela el panel revela el indicador correcto sin ninguna línea de código nueva.

### Portrait Frame
Marco editorial `4/5` con `overflow: hidden`, radio `12px`, fondo navy mientras carga y sombra Float. Los dos archivos de origen no coinciden en tamaño, encuadre ni temperatura, y el segundo está rellenado hasta cuadrado con una copia desenfocada de sí mismo; el marco recorta esa costura fuera de cuadro. La corrección de fondo es re-exportar el archivo.

## Motion

Un solo momento autoral en todo el sitio: **la Rúbrica**. Un trazo dorado de 2px que crece bajo el nombre de la notaría, 900ms con `cubic-bezier(0.22, 0.85, 0.25, 1)` —salida rápida, asentamiento largo, como una pluma— y 620ms de retraso, para que el trazo caiga *después* de que el título haya asentado. El lede y el CTA esperan al trazo en lugar de competir con él. Es literalmente la rúbrica: el trazo que un fedatario dibuja bajo su firma.

Todo lo demás está quieto. Las siete apariciones de `.animate-fade-in-up` bajo el pliegue del index completaban su animación fuera de pantalla y el visitante nunca las veía; están neutralizadas.

**La Regla del Movimiento Único.** Un sitio, un momento. Si algo nuevo necesita animarse, primero hay que decidir qué deja de animarse.

**La guarda de `prefers-reduced-motion` no es opcional.** El patrón `opacity: 0` más animación tiene como modo de fallo contenido invisible para siempre.

## Do's and Don'ts

### Do:
- **Do** editar `public/css/style.css`: es la hoja que el layout sirve. `resources/css/` no alimenta la página.
- **Do** escribir todo lo nuevo con los tokens `--n4-*` declarados al final de esa hoja.
- **Do** heredar de `erp-frontend/DESIGN.md` los valores de color y las familias tipográficas; si el ERP cambia su navy o su oro, este archivo se actualiza con él.
- **Do** usar navy para texto sobre superficie clara, y Brass cuando haga falta una línea metálica ahí.
- **Do** teñir de navy toda sombra nueva, y darle dos capas.
- **Do** asociar toda etiqueta de formulario con `for`, anunciar los errores con `role="alert"` y confirmar el envío con un estado visible.
- **Do** asumir que no hay JavaScript propio disponible fuera del wizard: CSS puro, el JS de Bootstrap 4, o controles nativos de HTML.
- **Do** usar fotografía real de la notaría, su edificio y sus titulares.

### Don't:
- **Don't** portar el vocabulario de estado del ERP: `.o2c-badge`, `.o2c-chip`, `.o2c-count-chip`, `.notary-audit-chip`, `.notary-legal-card` ni `tr.pld-row--*`.
- **Don't** consumir los tokens `--o2c-*`: el contrato de retintado de la librería no existe en este proyecto y declararlos aquí crearía una segunda fuente de verdad.
- **Don't** construir un modo oscuro ni añadir `@media (prefers-color-scheme: dark)`.
- **Don't** poner texto dorado sobre blanco o sobre `#f8f9fa`, en ningún tono de la rampa.
- **Don't** usar colores por defecto de Bootstrap para acciones, acentos o estado: `text-primary`, `bg-*-subtle`, `text-success`, `alert-warning`, `badge-success`, `btn-outline-danger`.
- **Don't** hacer que una tarjeta se levante al pasar el cursor. Sólo los controles responden.
- **Don't** poner un borde de acento de más de 1px a la izquierda de una tarjeta, lista o alerta.
- **Don't** añadir una segunda animación sin retirar la existente.
- **Don't** usar el marcador de posición como etiqueta de un campo.
- **Don't** añadir a la banda de Acreditación nada que no sea un hecho registral verificable: sin certificaciones con nombre, métricas, testimonios, precios ni adjetivos.

---

## Anexo A: enmiendas a la versión anterior de este documento

Tres puntos donde la primera versión de este archivo y la aritmética de contraste no coincidían. Las tres fueron autorizadas explícitamente.

1. **`hairline-navy` pasa de `rgba(13,43,62,0.05)` a `0.12`.** A 0.05 el borde daba 1.03:1 sobre blanco: era invisible. El documento afirmaba que ese hairline es lo que sostiene la marca cuando la tarjeta no tiene color; a 0.05 esa afirmación no podía ser cierta.
2. **El Medallón de Sección se invierte.** Era glifo dorado sobre dorado al 10% (1.65:1), casi invisible, en el componente que el documento presentaba como ejemplar. Ahora es glifo dorado sobre disco navy (8.43:1).
3. **`.btn-executive-nav` renuncia al oro.** Documentado como píldora fantasma dorada, era un cuarto elemento dorado y un segundo CTA compitiendo con el del hero dentro del mismo viewport. Ahora es fantasma blanco.

Y una corrección de hecho: la versión anterior afirmaba que `accent-gold-dark` (`#d2ae3c`) era "la única forma en que el oro puede aparecer como texto sobre superficie clara". Da 2.13:1. No lo es, y ya no se usa así en ninguna parte; para línea metálica sobre fondo claro está Brass.

## Anexo B: deriva conocida

Hechos verificados sobre el estado del código, no reglas de diseño.

**Corregido**
- Los `alt` de los dos retratos nombraban a dos hombres de otro despacho (`Dr. Geudiel Peláez`, `Isaí Peláez`). Un lector de pantalla anunciaba nombres falsos en la página que existe para probar identidad.
- `services_catalog.blade.php` tenía **tres `<div>` sin cerrar**: el visor de PDF y el `<footer>` completo se renderizaban dentro de la tarjeta blanca, que además se levantaba al pasar el cursor.
- `.btn.btn-primary` llevaba `background-color: #d2ae3c !important`, de modo que el hover era idéntico al reposo: el CTA principal del sitio no tenía estado de hover.
- El pie de página usaba una fotografía de stock con un mazo de juez —instrumento del poder judicial, no de un fedatario— y sin velo alguno; el párrafo del nombramiento quedaba en blanco sobre una libreta color crema (≈1.2:1) y los enlaces a `rgba(255,255,255,0.5)`.
- El hero apilaba dos velos (negro al 20% bajo un gradiente navy) y en su esquina débil daba 2.80:1, por debajo incluso del 3:1 de texto grande.
- No había ningún indicador de foco: el halo dorado al 50% da 1.31:1 y se aplicaba por igual a hover, active y focus.
- `.site-navbar` llevaba `box-shadow: 0 4px 6px rgba(0,0,0,0.9)`: una banda negra casi opaca sobre la fotografía.
- `.book-form` tenía `margin-bottom: -300px` bajo 992px: el formulario de cita se montaba sobre el pie de página en todo móvil.
- El campo de fecha era texto libre contra una columna `DATE`, porque `bootstrap-datepicker` nunca cargaba. Ahora es `type="date"` nativo con `min`/`max`.
- Los tres formularios públicos escribían `$request->all()` sin validar y devolvían `view()` desde un POST: recargar duplicaba el registro. Ahora validan, tienen honeypot, `throttle:5,1` y Post/Redirect/Get.
- `.text-primary` pintaba los cargos de las fedatarias en el azul `#007bff` de Bootstrap (3.98:1), y las pastillas del catálogo iban en el mismo azul.
- Diez `<script>` y cuatro hojas de estilo cargaban librerías inexistentes (404). Retirados del layout.
- El menú fuera de lienzo era alcanzable por teclado estando oculto, en todos los breakpoints.
- Faltaban `<title>` por página, `meta description`, Open Graph y enlace de salto al contenido.
- En el wizard: el botón "Atrás" ejecutaba `form.reset()` sin confirmar, borrando veinte campos capturados en un celular; el botón final hacía `location.reload()`, que destruía el historial de carga y devolvía al usuario al paso 1 sin confirmación; las 21 etiquetas del registro no tenían `for`; la carga de archivos dependía del `.custom-file` de Bootstrap, cuya etiqueta no se actualiza sin JavaScript; y la pantalla de error daba el mismo texto para una liga caducada que para un ERP caído.

**Abierto**
- **`resources/views/privacy.blade.php` publica una nota de trabajo interna** dentro del Aviso de Privacidad: *"Atención: El contenido legal de este Aviso de Privacidad debe ser proporcionado por la Notaría…"*. Es visible para cualquier visitante y anuncia que el aviso legal de una notaría no está terminado. Mientras no llegue el texto definitivo, el enlace del pie de página no debería publicarse.
- **No hay teléfono ni correo en ninguna página del sitio.** Cero `tel:` y cero `mailto:` en `resources/views/`. Falta sobre todo en la pantalla de token inválido, donde el propio texto pide comunicarse con la notaría sin decir cómo. Es un dato que sólo la notaría puede aportar.
- **Los dos retratos son fotografías guardadas como PNG**, de 1.19 MB y 1.00 MB. Convertir a JPEG de calidad 80 debería dejarlos cerca de 120 KB cada uno. `portada1.jpg` pesa 518 KB.
- **`maestra_norma_cortes.png` es un escaneo suave rellenado hasta cuadrado** con una copia desenfocada de sí mismo. El marco `4/5` recorta la costura, pero la corrección real es re-exportar el archivo.
- **El bundle del wizard está desfasado respecto a su fuente**: `resources/js/expediente-link.js` es 11 minutos más nuevo que `public/build/assets/expediente-link-*.js`. Lo que corre en producción no es necesariamente lo que está en el repositorio. Tres etiquetas de botón del wizard las restaura ese bundle y por eso se dejaron sin tocar; mejorarlas exige `npm run build`.
- **`ServicesController` usa `withoutVerifying()` en cuatro llamadas HTTP al ERP**, lo que desactiva la validación del certificado TLS en el canal por el que viajan datos de otorgantes.
- **`services.blade.php` afirma que los honorarios se calculan conforme al Arancel Profesional vigente en Puebla.** Es una afirmación legal sobre precios; `PRODUCT.md` registra que no hay tabulador público. Requiere confirmación de la notaría.
- **`resources/css/style.css` divergió de `public/css/style.css`.** La versión de `resources/` es la vieja y no se sirve.
- **Reglas muertas de la plantilla original**: `.listing`, `.post-entry-1`, `.practicing`, `.play-now`, `.custom-pagination`, `.trip-form`, `.ul-check`, `.testimonial-*`, `.has-children`/`.dropdown`, `.sticky-wrapper`, y todo el sistema `.accordion-*` (el catálogo migró a pills y collapse de Bootstrap). Ninguna vista las usa; son candidatas a borrado, no referencia de diseño.
