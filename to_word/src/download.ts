export function Export2Word(element: HTMLButtonElement, focus:HTMLDivElement[], filename:string) {
	const preHtml =`
        <html xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:w='urn:schemas-microsoft-com:office:word' xmlns='http://www.w3.org/TR/REC-html40'>
        <head><meta charset='utf-8'><title>${filename}</title></head>
        <body>
    `
	const postHtml = "</body></html>"
	const pageBreak = "<w:p><w:r><w:br w:type='page'/></w:r></w:p>"

	// let html = preHtml
	// for (const div of focus) {
	// 	html += div.innerHTML
	// }
	// html += postHtml

	let html = preHtml
	for(let i = 0; i < focus.length; i++) {
		html += focus[i].innerHTML
		if(i !== focus.length - 1) {
			html += pageBreak
		}
	}
	html += postHtml

	const url = `data:application/vnd.ms-word;charset=utf-8,${encodeURIComponent(html)}`
	const filenameName = filename ? `${filename}.docx` : 'document.docx'

	element.addEventListener("click", () => {
		const downloadLink = document.createElement("a")
		document.body.appendChild(downloadLink)
		downloadLink.href = url
		downloadLink.download = filenameName
		downloadLink.click()
		document.body.removeChild(downloadLink)
	})
}