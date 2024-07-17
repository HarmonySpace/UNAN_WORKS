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
  </div>
  `
}

const d_word_button = document.querySelector<HTMLButtonElement>("#d_word");
const d_export = document.querySelector<HTMLDivElement>("#export");
if (d_word_button && d_export) {
  Export2Word(d_word_button, d_export, "document");
}
//setupCounter(document.querySelector<HTMLButtonElement>('#counter')!);
