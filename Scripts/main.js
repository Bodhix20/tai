//importing the necessary module
import { profile_class } from "./profile_class"

//instantiate the class
const currentProfile = new profile_class()

window.onload = function(){

    //first we set the event listener which will set the profile type and show the html div for setting the material of the profile
    const labels = document.querySelectorAll(".profileSelectionRadioBTN")

    for(let i=0 ; i<labels.length ; i++){
        labels[i].addEventListener("click",function(){
            currentProfile.setProfileType(i)
            document.getElementById("lengthAndMaterialSelectionContainer").style.display = "block"            
        })
    }

    //we also set an event listener on the submit button to set the other important values
    const material = document.getElementById("materialSelectionDropdown").value
    const length = document.getElementById("lengthInputTextbox").value

    document.getElementById("brutFormSubmitButton").addEventListener("click",function(){
        console.log(material, length)
    })

}