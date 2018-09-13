function changeImage(images, slide, time, i) {
    var imageNodeList = document.getElementsByName(slide);
    var imageNode = imageNodeList[0];
    imageNode.src = images[i];
    // var eval_str="document."+slide+".src = '" + images[i] +"';";
    //eval("document."+slide+".src = '" + images[i] +"';");
    if (i < images.length - 1) {
        i++;
    } else {
        i = 0;
    }
    setTimeout(function () {
        changeImage(images, slide, time, i);
    }, time);
}

/*sctipt tab title*/
function opentab(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

<!--script Simple collapsible-->
function Simple() {
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function () {

            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
            } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
            }
        });
    }

};

window.onload = function () {
    // Image list
    var images = [];
    images[0] = '../assets/images/slide1.jpg';
    images[1] = '../assets/images/slide2.jpg';
    images[2] = '../assets/images/slide3.jpg';
    images[3] = '../assets/images/slide4.jpg';
    var images2 = [];
    images2[0] = '../assets/images/phone.jpg';
    images2[1] = '../assets/images/phone1.jpg';
    images2[2] = '../assets/images/phone2.jpg';
    images2[3] = '../assets/images/phone3.jpg';
    var images3 = [];
    images3[0] = '../assets/images/sac.jpg';
    images3[1] = '../assets/images/sac1.jpg';
    images3[2] = '../assets/images/sac2.jpg';
    images3[3] = '../assets/images/sac3.jpg';
    changeImage(images, 'slide', 2000, 0);
    changeImage(images2, 'slide2', 1500, 0);
    changeImage(images3, 'slide3', 2500, 0);
    Simple();

}

