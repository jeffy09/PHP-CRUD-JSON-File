function themeColor(){switch(window.localStorage.getItem("activeCustomcolor")){case"customizer-color01":document.documentElement.style.setProperty("--bs-primary-rgb","97, 83, 204");break;case"customizer-color02":document.documentElement.style.setProperty("--bs-primary-rgb","4, 135, 101");break;case"customizer-color03":document.documentElement.style.setProperty("--bs-primary-rgb","48, 197, 210");break;default:document.documentElement.style.setProperty("--bs-primary-rgb","")}}function themeColor(e){var o=localStorage.getItem("activeCustomcolor");o&&(document.getElementById(o).checked=!0),document.querySelectorAll(".theme-color").forEach(function(t){var e=document.querySelector("input[name=bgcolor-radio]:checked");e&&(e=e.id,e=document.getElementsByClassName(e),e=window.getComputedStyle(e[0],null).getPropertyValue("background-image"),rgbColorSecondary=e.substring(e.indexOf("b")+2,e.indexOf(")")),rgbColorPrimary=e.substring(e.lastIndexOf("(")+1,e.lastIndexOf(")")-1)),t.addEventListener("click",function(e){t.id&&localStorage.setItem("activeCustomcolor",t.id);var o=document.querySelector("input[name=bgcolor-radio]:checked");o&&(o=o.id,(o=document.getElementsByClassName(o))&&(o=window.getComputedStyle(o[0],null).getPropertyValue("background-image"),rgbColorSecondary=o.substring(o.indexOf("b")+2,o.indexOf(")")),rgbColorPrimary=o.substring(o.lastIndexOf("(")+1,o.lastIndexOf(")")-1),window.localStorage.setItem("colorPrimary",rgbColorPrimary),window.localStorage.setItem("colorSecondary",rgbColorSecondary),document.documentElement.style.setProperty("--bs-primary-rgb",window.localStorage.getItem("colorPrimary")),document.documentElement.style.setProperty("--bs-secondary-rgb",window.localStorage.getItem("colorSecondary"))))})})}themeColor(),document.documentElement.style.setProperty("--bs-primary-rgb",window.localStorage.getItem("colorPrimary")),document.documentElement.style.setProperty("--bs-secondary-rgb",window.localStorage.getItem("colorSecondary"));var primaryColor=window.getComputedStyle(document.body,null).getPropertyValue("--bs-primary-rgb");themeColor(primaryColor);