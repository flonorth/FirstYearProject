

function showForm(formId){
    document.querySelectorAll(".form-box").forEach(form => form.classList.remove("active"));
    document.getElementById(formId).classList.add("active");
}



let darkmode = localStorage.getItem('darkmode')
const theme = document.getElementById('theme-switch')


const enableDarkmode = () => {
    document.body.classList.add('darkmode')
    localStorage.setItem('darkmode','active')
}
const disableDarkmode = () => {
    document.body.classList.remove('darkmode')
    localStorage.removeItem('darkmode')
}

if(darkmode === "active") enableDarkmode()

theme.addEventListener("click",()=> {
    darkmode = localStorage.getItem('darkmode')
    darkmode !== "active" ? enableDarkmode() : disableDarkmode()

    if(theme.textContent === "⏾") {
        theme.textContent = "☀︎";

    }

    else{
        theme.textContent = "⏾";
    }
})






