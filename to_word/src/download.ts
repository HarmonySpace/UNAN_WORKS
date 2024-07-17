export function Export2Word(element: HTMLButtonElement, focus:HTMLDivElement, filename:string) {
	const preHtml ="<html xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:w='urn:schemas-microsoft-com:office:word' xmlns='http://www.w3.org/TR/REC-html40'><head><meta charset='utf-8'><title>Export HTML To Doc</title></head><body>"
	const postHtml = "</body></html>"
	const html = preHtml + focus.innerHTML + postHtml
	let blob: Blob
	if (html !== "") {
		blob = new Blob(['\ufeff', html], {
			type: 'application/msword'
		})
	} else {
		console.log("HTML not found")
	}
	const url = `data:application/vnd.ms-word;charset=utf-8,${encodeURIComponent(html)}`
	const filenameName = filename ? `${filename}.doc` : 'document.doc'

	element.addEventListener("click", () => {
		const downloadLink = document.createElement("a")
		document.body.appendChild(downloadLink)
		downloadLink.href = url
		downloadLink.download = filenameName
		downloadLink.click()
		document.body.removeChild(downloadLink)
	})
}