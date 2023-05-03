// ====DARK MODE ====
let mode = "mode"
function getCookie(name) {
    // Split cookie string and get all individual name=value pairs in an array
    var cookieArr = document.cookie.split(";");
    
    // Loop through the array elements
    for(var i = 0; i < cookieArr.length; i++) {
        var cookiePair = cookieArr[i].split("=");
        
        /* Removing whitespace at the beginning of the cookie name
        and compare it with the given string */
        if(name == cookiePair[0].trim()) {
            // Decode the cookie value and return
            return decodeURIComponent(cookiePair[1]);
        }
    }
    // Return null if not found
    return null;
}
// window.addEventListener('load', ()=>{
// 	if (getCookie(mode)=="dark"){
// 		document.body.classList.toggle('darkMode')
// }})
const darkBtn = document.getElementById('darkBtn')
darkBtn.addEventListener('click', () => {
	if (getCookie(mode)=="darkMode"){
		document.cookie= 'mode=white ; path=/; domain=rss.localhost; max-age=31000000'
		document.body.classList.toggle('darkMode')

	} else {
	document.body.classList.toggle('darkMode')
	document.cookie= 'mode=darkMode ; path=/; domain=rss.localhost; max-age=31000000'
}})


console.log(getCookie(mode))

//recuper les checkboxs
const checkboxArray = document.querySelectorAll('[type=checkbox]')
const settingsBtn = document.getElementById('settingsBtn')

//boucler sur les checkboxs
checkboxArray.forEach((checkbox) => {
	//Event sur le changement de status des checkbox
	checkbox.addEventListener('change', () => {
		//Si plus de 3 checkbox, limiter
		if (document.querySelectorAll('[type=checkbox]:checked').length > 3) {
			checkbox.checked = false
			document.getElementById('checkboxInfo').innerHTML = 'Vous ne pouvez plus choisir de sujet'
		}
	})
})
//Si moins de 3 choix, empecher validation
settingsBtn.addEventListener('click', (event) => {
	if (document.querySelectorAll('[type=checkbox]:checked').length < 3) {
		document.getElementById('checkboxInfo').innerHTML = 'Vous devez choisir 3 sujets'
		event.preventDefault()
	}
})
