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
    if (reachAboutUs <= scrollDistance && scrollDistance < reachPrice) // if we  reach to the about us section and not have reached to price section yet
        activeLink[0].classList.add('active') // the class of the div of this section will be added "active"
    else activeLink[0].classList.remove('active') // otherwise, it will be disable
    if (reachPrice <= scrollDistance && scrollDistance < reachNowShowing) // if we  reach to the price section and not have reached to nowshowing section yet
        activeLink[1].classList.add('active') // the class of the div of this section will be added "active"
    else activeLink[1].classList.remove('active') // otherwise, it will be disable
    if (reachNowShowing <= scrollDistance) // if we  reach to the now showing section
        activeLink[2].classList.add('active') // the class of the div of this section will be added "active"
    else activeLink[2].classList.remove('active') // otherwise, it will be disable
})




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

//booking form

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

var movieInfo = {
    Name: ["Avengers: Endgame", "Top End Wedding", "Dumbo", "Happy Prince"],
    Day: ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
    Time: ["0", "3pm", "6pm", "9pm", "12pm"]

}

//  Avengers button
document.getElementById('myBtn').onclick = function () { showFilminfo(movieInfo['Name'][0], movieInfo['Day'][2], movieInfo['Time'][3]) };
document.getElementById('myBtn1').onclick = function () { showFilminfo(movieInfo['Name'][0], movieInfo['Day'][4], movieInfo['Time'][3]) };
document.getElementById('myBtn2').onclick = function () { showFilminfo(movieInfo['Name'][0], movieInfo['Day'][5], movieInfo['Time'][2]) };
document.getElementById('myBtn3').onclick = function () { showFilminfo(movieInfo['Name'][0], movieInfo["Day"][6], movieInfo['Time'][2]) };

// Top end wedding button
document.getElementById('myBtna').onclick = function () { showFilminfo(movieInfo['Name'][1], movieInfo['Day'][0], movieInfo['Time'][2]) };
document.getElementById('myBtn1a').onclick = function () { showFilminfo(movieInfo['Name'][1], movieInfo['Day'][1], movieInfo['Time'][2]) };
document.getElementById('myBtn2a').onclick = function () { showFilminfo(movieInfo['Name'][1], movieInfo['Day'][5], movieInfo['Time'][1]) };
document.getElementById('myBtn3a').onclick = function () { showFilminfo(movieInfo['Name'][1], movieInfo['Day'][6], movieInfo['Time'][1]) };

//  Dumbo button
document.getElementById('myBtnb').onclick = function () { showFilminfo(movieInfo['Name'][2], movieInfo['Day'][0], movieInfo['Time'][4]) };
document.getElementById('myBtn1b').onclick = function () { showFilminfo(movieInfo['Name'][2], movieInfo['Day'][1], movieInfo['Time'][4]) };
document.getElementById('myBtn2b').onclick = function () { showFilminfo(movieInfo['Name'][2], movieInfo['Day'][2], movieInfo['Time'][2]) };
document.getElementById('myBtn3b').onclick = function () { showFilminfo(movieInfo['Name'][2], movieInfo['Day'][4], movieInfo['Time'][2]) };
document.getElementById('myBtn4b').onclick = function () { showFilminfo(movieInfo['Name'][2], movieInfo['Day'][5], movieInfo['Time'][4]) };
document.getElementById('myBtn5b').onclick = function () { showFilminfo(movieInfo['Name'][2], movieInfo['Day'][6], movieInfo['Time'][4]) };

//  Happy prince button
document.getElementById('myBtnc').onclick = function () { showFilminfo(movieInfo['Name'][3], movieInfo['Day'][2], movieInfo['Time'][4]) };
document.getElementById('myBtn1c').onclick = function () { showFilminfo(movieInfo['Name'][3], movieInfo['Day'][4], movieInfo['Time'][4]) };
document.getElementById('myBtn2c').onclick = function () { showFilminfo(movieInfo['Name'][3], movieInfo['Day'][5], movieInfo['Time'][3]) };
document.getElementById('myBtn3c').onclick = function () { showFilminfo(movieInfo['Name'][3], movieInfo['Day'][6], movieInfo['Time'][3]) };


// total price

function totalPrice() {
    var seatPrice = {
        STA: {
            discount: 14.00,
            notDiscount: 19.80
        },
        STP: {
            discount: 12.50,
            notDiscount: 17.50
        },
        STC: {
            discount: 11.00,
            notDiscount: 15.30
        },
        FCA: {
            discount: 22.50,
            notDiscount: 27.00
        },
        FCP: {
            discount: 24.00,
            notDiscount: 30.00
        },
        FCC: {
            discount: 21.00,
            notDiscount: 24.00
        },
    }

    var numberOfSeatSTA = document.getElementById('seats-STA').value
    var numberOfSeatSTP = document.getElementById('seats-STP').value
    var numberOfSeatSTC = document.getElementById('seats-STC').value
    var numberOfSeatFCA = document.getElementById('seats-FCA').value
    var numberOfSeatFCP = document.getElementById('seats-FCP').value
    var numberOfSeatFCC = document.getElementById('seats-FCC').value
    // discount or not
    if (document.getElementById('formDay').innerHTML !== movieInfo['Day'][5] // not Saturday
        && document.getElementById('formDay').innerHTML !== movieInfo['Day'][6]  // not Sunday
        && document.getElementById('formTime').innerHTML == movieInfo['Time'][4]) // 12pm 
    {
        var priceSTA = seatPrice['STA']['discount']
        var priceSTP = seatPrice['STP']['discount']
        var priceSTC = seatPrice['STC']['discount']
        var priceFCA = seatPrice['FCA']['discount']
        var priceFCP = seatPrice['FCP']['discount']
        var priceFCC = seatPrice['FCC']['discount']
    }
    else {
        var priceSTA = seatPrice['STA']['notDiscount']
        var priceSTP = seatPrice['STP']['notDiscount']
        var priceSTC = seatPrice['STC']['notDiscount']
        var priceFCA = seatPrice['FCA']['notDiscount']
        var priceFCP = seatPrice['FCP']['notDiscount']
        var priceFCC = seatPrice['FCC']['notDiscount']
    }
    priceOfSeatSTA = numberOfSeatSTA * priceSTA
    priceOfSeatSTP = numberOfSeatSTP * priceSTP
    priceOfSeatSTC = numberOfSeatSTC * priceSTC
    priceOfSeatFCA = numberOfSeatFCA * priceFCA
    priceOfSeatFCP = numberOfSeatFCP * priceFCP
    priceOfSeatFCC = numberOfSeatFCC * priceFCC


    var total = priceOfSeatSTA + priceOfSeatSTP + priceOfSeatSTC + priceOfSeatFCA + priceOfSeatFCP + priceOfSeatFCC;
    if (!isNaN(total))
        document.getElementById("total").innerHTML = total
}

