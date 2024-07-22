import "./style.css";
//import { setupCounter } from './counter.ts';
import { Export2Word } from "./download.ts";

const appElement = document.querySelector<HTMLDivElement>("#app");
if (appElement) {
	appElement.innerHTML = `
  <div id="export">
    <h1>Download File</h1>
    <div class="card">
      <button id="d_word" type="button">Download word file</button>
    </div>
    <p class="read-the-docs">
      Click en el botón para crear un word con el contenido actual
    </p>
    <div id="div1" class="card page-break">
      <p class="read-the-docs">
        Click en el botón para crear un word con el contenido actual
      </p>
    </div>
    <div id="div2" class="card page-break"">
      <p class="read-the-docs">
        Click en el botón para crear un word con el contenido actual
      </p>
    </div>
  </div>
  `;
}

const d_word_button = document.querySelector<HTMLButtonElement>("#d_word");
const div1 = document.querySelector<HTMLDivElement>("#div1");
const div2 = document.querySelector<HTMLDivElement>("#div2");
if (d_word_button && div1 && div2) {
	Export2Word(d_word_button, [div1, div2], "document");
}
//setupCounter(document.querySelector<HTMLButtonElement>('#counter')!);
