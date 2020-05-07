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
// Endgame
function getContent(x) {
    if (x == 1) {
        document.getElementById('content1').style.display = 'block';
        document.getElementById('content1').scrollIntoView();
        showFilminfo(movieInfo['Name'][0], "Day" , "Time")

    }
    else
        document.getElementById('content1').style.display = 'none';
    document.getElementById('content2').style.display = 'none';
    document.getElementById('content3').style.display = 'none';
    document.getElementById('content4').style.display = 'none';
}
document.getElementById('content1-btn').onclick = function () { getContent(1) };

// Top end wedding 
function getContent1(x) {
    if (x == 2) {
        document.getElementById('content2').style.display = 'block'
        document.getElementById('content2').scrollIntoView();
        showFilminfo(movieInfo['Name'][1], "Day" , "Time")

    }
    else
        document.getElementById('content2').style.display = 'none';
    document.getElementById('content1').style.display = 'none';
    document.getElementById('content3').style.display = 'none';
    document.getElementById('content4').style.display = 'none';

}

document.getElementById('content2-btn').onclick = function () { getContent1(2) };

// Dumbo
function getContent2(x) {
    if (x == 3) {
        document.getElementById('content3').style.display = 'block'
        document.getElementById('content3').scrollIntoView();
        showFilminfo(movieInfo['Name'][2], "Day" , "Time")
    }
    else
        document.getElementById('content3').style.display = 'none';
    document.getElementById('content1').style.display = 'none';
    document.getElementById('content2').style.display = 'none';
    document.getElementById('content4').style.display = 'none';
}
document.getElementById('content3-btn').onclick = function () { getContent2(3) };

// Haapy Prince
function getContent3(x) {
    if (x == 4) {
        document.getElementById('content4').style.display = 'block'
        document.getElementById('content4').scrollIntoView();
        showFilminfo(movieInfo['Name'][3], "Day" , "Time")
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

function showFilminfo(nameFilm = "", dayFilm = "", timeFilm = "", idFilm = "") {
    if (!document.getElementById('booking').classList.contains("show")) {
        document.getElementById('booking').classList.add("show");
    }
    document.getElementById('formTitle').innerHTML = nameFilm;
    document.getElementById('space').innerHTML = "-";

    document.getElementById('formDay').innerHTML = dayFilm;
    document.getElementById('movie-day').value = dayFilm; // set value for movie-day 
    document.getElementById('space1').innerHTML = "-";

    document.getElementById('formTime').innerHTML = timeFilm;
    document.getElementById('movie-hour').value = timeFilm; // set value for movie-hour 
    document.getElementById('formID').innerHTML = idFilm;
    document.getElementById('movie-id').value = idFilm; // set value for movie-id 
}


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
        && document.getElementById('formTime').innerHTML == movieInfo['Time'][4] // 12pm 
        || document.getElementById('formDay').innerHTML == movieInfo['Day'][0] // Monday
        || document.getElementById('formDay').innerHTML == movieInfo['Day'][2]) // Wednesday



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



// button declaration

var button = document.getElementById("myBtn")
var button1 = document.getElementById("myBtn1")
var button2 = document.getElementById("myBtn2")
var button3 = document.getElementById("myBtn3")
var button4 = document.getElementById("myBtn4")

var buttona = document.getElementById("myBtna")
var button1a = document.getElementById("myBtn1a")
var button2a = document.getElementById("myBtn2a")
var button3a = document.getElementById("myBtn3a")
var button4a = document.getElementById("myBtn4a")

var buttonb = document.getElementById("myBtnb")
var button1b = document.getElementById("myBtn1b")
var button2b = document.getElementById("myBtn2b")
var button3b = document.getElementById("myBtn3b")
var button4b = document.getElementById("myBtn4b")
var button5b = document.getElementById("myBtn5b")
var button6b = document.getElementById("myBtn6b")

var buttonc = document.getElementById("myBtnc")
var button1c = document.getElementById("myBtn1c")
var button2c = document.getElementById("myBtn2c")
var button3c = document.getElementById("myBtn3c")
var button4c = document.getElementById("myBtn4c")




// Movie title,day,time

var movieInfo = {
    Name: ["Avengers: Endgame ", "Top End Wedding ", "Dumbo ", "Happy Prince "],
    Day: ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
    Time: ["0", "3pm", "6pm", "9pm", "12pm"],
    Id: ["ACT", " AHF", "ANM", "RMC "]

}

// Reset Booking Form 

function Reset() {

    var dropDown = document.getElementById("seats-STA");
    var dropDown1 = document.getElementById("seats-STP");
    var dropDown2 = document.getElementById("seats-STC");
    var dropDown3 = document.getElementById("seats-FCA");
    var dropDown4 = document.getElementById("seats-FCP");
    var dropDown5 = document.getElementById("seats-FCC");


    dropDown.selectedIndex = 0;
    dropDown1.selectedIndex = 0;
    dropDown2.selectedIndex = 0;
    dropDown3.selectedIndex = 0;
    dropDown4.selectedIndex = 0;
    dropDown5.selectedIndex = 0;

    document.getElementById("total").innerHTML = ''

    $('#cust-name').val(' ');
    $('#cust-mail').val(' ');
    $('#cust-mobile').val(' ');
    $('#cust-credit').val(' ');
    $('#cust-expiry').val(' ');

}


//  Avengers button
button.addEventListener("click", function () { showFilminfo(movieInfo['Name'][0], movieInfo['Day'][2], movieInfo['Time'][3], movieInfo['Id'][0]) });
button.addEventListener("click", Reset);

button1.addEventListener("click", function () { showFilminfo(movieInfo['Name'][0], movieInfo['Day'][4], movieInfo['Time'][3], movieInfo['Id'][0]) });
button1.addEventListener("click", Reset);

button2.addEventListener("click", function () { showFilminfo(movieInfo['Name'][0], movieInfo['Day'][5], movieInfo['Time'][2], movieInfo['Id'][0]) });
button2.addEventListener("click", Reset);

button3.addEventListener("click", function () { showFilminfo(movieInfo['Name'][0], movieInfo["Day"][6], movieInfo['Time'][2], movieInfo['Id'][0]) });
button3.addEventListener("click", Reset);

button4.addEventListener("click", function () { showFilminfo(movieInfo['Name'][0], movieInfo["Day"][3], movieInfo['Time'][3], movieInfo['Id'][0]) });
button4.addEventListener("click", Reset);

// Top end wedding button
buttona.addEventListener("click", function () { showFilminfo(movieInfo['Name'][1], movieInfo['Day'][0], movieInfo['Time'][2], movieInfo['Id'][1]) });
buttona.addEventListener("click", Reset);

button1a.addEventListener("click", function () { showFilminfo(movieInfo['Name'][1], movieInfo['Day'][1], movieInfo['Time'][2], movieInfo['Id'][1]) });
button1a.addEventListener("click", Reset);

button2a.addEventListener("click", function () { showFilminfo(movieInfo['Name'][1], movieInfo['Day'][5], movieInfo['Time'][1], movieInfo['Id'][1]) });
button2a.addEventListener("click", Reset);

button3a.addEventListener("click", function () { showFilminfo(movieInfo['Name'][1], movieInfo['Day'][6], movieInfo['Time'][1], movieInfo['Id'][1]) });
button3a.addEventListener("click", Reset);


//  Dumbo button
buttonb.addEventListener("click", function () { showFilminfo(movieInfo['Name'][2], movieInfo['Day'][0], movieInfo['Time'][4], movieInfo['Id'][2]) });
buttonb.addEventListener("click", Reset);

button1b.addEventListener("click", function () { showFilminfo(movieInfo['Name'][2], movieInfo['Day'][1], movieInfo['Time'][4], movieInfo['Id'][2]) });
button1b.addEventListener("click", Reset);

button2b.addEventListener("click", function () { showFilminfo(movieInfo['Name'][2], movieInfo['Day'][2], movieInfo['Time'][2], movieInfo['Id'][2]) });
button2b.addEventListener("click", Reset);

button3b.addEventListener("click", function () { showFilminfo(movieInfo['Name'][2], movieInfo['Day'][4], movieInfo['Time'][2], movieInfo['Id'][2]) });
button3b.addEventListener("click", Reset);

button4b.addEventListener("click", function () { showFilminfo(movieInfo['Name'][2], movieInfo['Day'][5], movieInfo['Time'][4], movieInfo['Id'][2]) });
button4b.addEventListener("click", Reset);

button5b.addEventListener("click", function () { showFilminfo(movieInfo['Name'][2], movieInfo['Day'][6], movieInfo['Time'][4], movieInfo['Id'][2]) });
button5b.addEventListener("click", Reset);

button6b.addEventListener("click", function () { showFilminfo(movieInfo['Name'][2], movieInfo['Day'][3], movieInfo['Time'][4]), movieInfo['Id'][2] });
button6b.addEventListener("click", Reset);



//  Happy prince button
buttonc.addEventListener("click", function () { showFilminfo(movieInfo['Name'][3], movieInfo['Day'][2], movieInfo['Time'][4], movieInfo['Id'][3]) });
buttonc.addEventListener("click", Reset);

button1c.addEventListener("click", function () { showFilminfo(movieInfo['Name'][3], movieInfo['Day'][4], movieInfo['Time'][4], movieInfo['Id'][3]) });
button1c.addEventListener("click", Reset);

button2c.addEventListener("click", function () { showFilminfo(movieInfo['Name'][3], movieInfo['Day'][5], movieInfo['Time'][3], movieInfo['Id'][3]) });
button2c.addEventListener("click", Reset);

button3c.addEventListener("click", function () { showFilminfo(movieInfo['Name'][3], movieInfo['Day'][6], movieInfo['Time'][3], movieInfo['Id'][3]) });
button3c.addEventListener("click", Reset);

button4c.addEventListener("click", function () { showFilminfo(movieInfo['Name'][3], movieInfo['Day'][3], movieInfo['Time'][4], movieInfo['Id'][3]) });
button4c.addEventListener("click", Reset);

var validateForm = document.getElementById("booking")
validateForm.addEventListener('submit', function (e) {
    if (document.getElementById('total').innerText == 0) {
         e.preventDefault() 
         alert("Please select the amount of ticket")
    }
})

// Get current month, year

var  min1 = new Date().getMonth() + 1;
     max1 = min1 + 5;
     select1 = document.getElementById('cust-Expiry-month');

var min = new Date().getFullYear();
    max = min + 2;
    select = document.getElementById('cust-Expiry-year');

    for (var i = min; i<=max; i++){
       var opt = document.createElement('option');
       opt.value = i;
       opt.innerHTML = i;
       select.appendChild(opt);
    }

    for (var i = min1; i<=max1; i++){
        var opt1 = document.createElement('option');
        opt1.value = i;
        opt1.innerHTML = i;
        select1.appendChild(opt1);
     }




