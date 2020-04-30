/* Insert your javascript here */

/* https://www.w3schools.com/jsref/prop_element_clientheight.asp */ // have a look at this site nha em

let activeLink = document.querySelectorAll('.nav-item') // 
let element = document.getElementsByTagName('nav') // get element which has tag name = nav, they are: about us, price, now showing
let navbarHeight = element[0].clientHeight // height of navigation bar equal to the height of aboutus_clientheight 
let aboutUs = document.getElementById('About-us') // assign variable aboutUs to get all the content in which the id = about-us
let price = document.getElementById('Prices') // assign variable price to get all the content in which the id = Prices
let nowshowing = document.getElementById('nowshowing') // assign variable nowshowing to get all the content in which the id = nowshowing
let reachAboutUs = aboutUs.offsetTop // assign reachAboutUs: get the height to reach About us section: from the top of page to "About us" section
let reachPrice = price.offsetTop // assign reachPrice: get the height to reach Price section: from the top of page to "Price" section
let reachNowShowing = nowshowing.offsetTop // assign reachNowShowing: get the height to reach Now showing section: from the top of page to "now showing" section

document.addEventListener('scroll', () => {
    let scrollDistance = navbarHeight + window.scrollY // the real scroll long is equaled to the height of navigation bar + window scrolling 
    if (reachAboutUs <= scrollDistance && scrollDistance < reachPrice) // if we scroll reach to the about us section and not have reached to price section yet
        activeLink[0].classList.add('active') // the class of the div of this section will be added "active"
    else activeLink[0].classList.remove('active') // otherwise, it will be disable
    if (reachPrice <= scrollDistance && scrollDistance < reachNowShowing) // if we scroll reach to the price section and not have reached to nowshowing section yet
        activeLink[1].classList.add('active') // the class of the div of this section will be added "active"
    else activeLink[1].classList.remove('active') // otherwise, it will be disable
    if (reachNowShowing <= scrollDistance) // if we scroll reach to the now showing section
        activeLink[2].classList.add('active') // the class of the div of this section will be added "active"
    else activeLink[2].classList.remove('active') // otherwise, it will be disable
})

// // Avengers button
document.getElementById('myBtn').onclick = function () { showFilminfo(movieInfo[0][0], movieInfo[3][0], movieInfo[3][1]) };
document.getElementById('myBtn1').onclick = function () { showFilminfo(movieInfo[0][0], movieInfo[4][0], movieInfo[4][1]) };
document.getElementById('myBtn2').onclick = function () { showFilminfo(movieInfo[0][0], movieInfo[5][0], movieInfo[5][1])  };
document.getElementById('myBtn3').onclick = function () { showFilminfo(movieInfo[0][0], movieInfo[6][0], movieInfo[6][1])  };

// // Top end wedding button
document.getElementById('myBtna').onclick = function () { showFilminfo(movieInfo[0][1], movieInfo[1][0], movieInfo[1][2])  };
document.getElementById('myBtn1a').onclick = function () { showFilminfo(movieInfo[0][1], movieInfo[2][0], movieInfo[2][2]) };
document.getElementById('myBtn2a').onclick = function () { showFilminfo(movieInfo[0][1], movieInfo[5][0], movieInfo[5][2]) };
document.getElementById('myBtn3a').onclick = function () { showFilminfo(movieInfo[0][1], movieInfo[6][0], movieInfo[6][2]) };

// // Dumbo button
document.getElementById('myBtnb').onclick = function () { showFilminfo(movieInfo[0][2], movieInfo[1][0], movieInfo[1][3]) };
document.getElementById('myBtn1b').onclick = function () { mshowFilminfo(movieInfo[0][2], movieInfo[2][0], movieInfo[2][3]) };
document.getElementById('myBtn2b').onclick = function () { showFilminfo(movieInfo[0][2], movieInfo[3][0], movieInfo[3][3]) };
document.getElementById('myBtn3b').onclick = function () { showFilminfo(movieInfo[0][2], movieInfo[4][0], movieInfo[4][3]) };
document.getElementById('myBtn4b').onclick = function () { showFilminfo(movieInfo[0][2], movieInfo[5][0], movieInfo[5][3]) };
document.getElementById('myBtn5b').onclick = function () { showFilminfo(movieInfo[0][2], movieInfo[6][0], movieInfo[6][3]) };

// // Happy prince button
document.getElementById('myBtnc').onclick = function () { showFilminfo(movieInfo[0][3], movieInfo[3][0], movieInfo[3][4]) };
document.getElementById('myBtn1c').onclick = function () { showFilminfo(movieInfo[0][3], movieInfo[4][0], movieInfo[4][4]) };
document.getElementById('myBtn2c').onclick = function () { showFilminfo(movieInfo[0][3], movieInfo[5][0], movieInfo[5][4]) };
document.getElementById('myBtn3c').onclick = function () { showFilminfo(movieInfo[0][3], movieInfo[6][0], movieInfo[6][4]) };






// Booking form movie title fuction

function showFilminfo(nameFilm = "", dayFilm = "", timeFilm = "") {
    if (!document.getElementById('booking').classList.contains("show")) {
        document.getElementById('booking').classList.add("show");
    }
    document.getElementById('formTitle').innerHTML = nameFilm;
    document.getElementById('formDay').innerHTML = dayFilm;
    document.getElementById('formTime').innerHTML = timeFilm;
}

// Movie title,day,time

var movieInfo = [
    ["Avengers: Endgame","Top End Wedding","Dumbo","Happy Prince"],
    ["Monday","0","6pm","12pm","0"],
    ["Tuesday","0","6pm","12pm","0"],
    ["Wednesday","9pm","0","6pm","12pm"],
    ["Friday","9pm","0","6pm","12pm"],
    ["Saturday","6pm","3pm","12pm","9pm"],
    ["Sunday","6pm","3pm","12pm","9pm"]
];




// display synopsis
function getContent(x) {
    if (x == 1) {
        document.getElementById('content1').style.display = 'block';
        document.getElementById('content1').scrollIntoView();
    }
    else
        document.getElementById('content1').style.display = 'none';
    document.getElementById('content2').style.display = 'none';
    document.getElementById('content3').style.display = 'none';
    document.getElementById('content4').style.display = 'none';
}
document.getElementById('content1-btn').onclick = function () { getContent(1) };

function getContent1(x) {
    if (x == 2) {
        document.getElementById('content2').style.display = 'block'
        document.getElementById('content2').scrollIntoView();
    }
    else
        document.getElementById('content2').style.display = 'none';
    document.getElementById('content1').style.display = 'none';
    document.getElementById('content3').style.display = 'none';
    document.getElementById('content4').style.display = 'none';

}

document.getElementById('content2-btn').onclick = function () { getContent1(2) };

function getContent2(x) {
    if (x == 3) {
        document.getElementById('content3').style.display = 'block'
        document.getElementById('content3').scrollIntoView();
    }
    else
        document.getElementById('content3').style.display = 'none';
    document.getElementById('content1').style.display = 'none';
    document.getElementById('content2').style.display = 'none';
    document.getElementById('content4').style.display = 'none';
}
document.getElementById('content3-btn').onclick = function () { getContent2(3) };

function getContent3(x) {
    if (x == 4) {
        document.getElementById('content4').style.display = 'block'
        document.getElementById('content4').scrollIntoView();
    }

    else
        document.getElementById('content4').style.display = 'none';
    document.getElementById('content1').style.display = 'none';
    document.getElementById('content2').style.display = 'none';
    document.getElementById('content3').style.display = 'none';

    return
}
document.getElementById('content4-btn').onclick = function () { getContent3(4) };

