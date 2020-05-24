let element = document.getElementsByTagName('nav') // get element which has tag name = nav, they are: about us, price, now showing
var navbarHeight = element[0].clientHeight // height of navigation bar equal to the height of aboutus_clientheight 
var aboutUs = document.getElementById('About-us') // assign variable aboutUs to get all the content in which the id = about-us
var price = document.getElementById('Prices') // assign variable price to get all the content in which the id = Prices
var nowshowing = document.getElementById('nowshowing') // assign variable nowshowing to get all the content in which the id = nowshowing
var reachAboutUs = aboutUs.offsetTop // assign reachAboutUs: get the height to reach About us section: from the top of page to "About us" section
var reachPrice = price.offsetTop // assign reachPrice: get the height to reach Price section: from the top of page to "Price" section
var reachNowShowing = nowshowing.offsetTop // assign reachNowShowing: get the height to reach Now showing section: from the top of page to "now showing" section
var activeLink = document.querySelectorAll('.nav-item')

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
// synopsis

var listId = ['sypnosisACT', 'sypnosisRMC', 'sypnosisANM', 'sypnosisAHF']
function displayContent(id1 = " ", id2 = " ", id3 = " ", id4 = " ") {
    showFilminfo((movieInfo['Name'][listId.indexOf(id1)]), "Day", "Time");
    document.getElementById(id1).style.display = 'block'
    document.getElementById(id2).style.display = 'none';
    document.getElementById(id3).style.display = 'none';
    document.getElementById(id4).style.display = 'none';
}
function scrollToRightPlace(id) {
    document.getElementById(id).scrollIntoView();
}

function getContent(id1 = " ", id2 = " ", id3 = " ", id4 = " ") {
    displayContent(id1, id2, id3, id4)
    scrollToRightPlace(id1)
    Reset()
}

document.getElementById('moviePanelACT').onclick = function () { getContent('sypnosisACT', 'sypnosisRMC', 'sypnosisANM', 'sypnosisAHF') } // end game
document.getElementById('moviePanelRMC').onclick = function () { getContent('sypnosisRMC', 'sypnosisACT', 'sypnosisANM', 'sypnosisAHF') } // top end wedding
document.getElementById('moviePanelANM').onclick = function () { getContent('sypnosisANM', 'sypnosisRMC', 'sypnosisACT', 'sypnosisAHF') } // dumbo 
document.getElementById('moviePanelAHF').onclick = function () { getContent('sypnosisAHF', 'sypnosisRMC', 'sypnosisANM', 'sypnosisACT') } // happy prince

// Booking form movie title fuction

function showFilminfo(nameFilm = "", dayFilm = "", timeFilm = "", idFilm = "") {
    if (!document.getElementById('booking').classList.contains("show")) {
        document.getElementById('booking').classList.add("show");
    }
    document.getElementById('formTitle').innerHTML = nameFilm;
    document.getElementById('movie-name').value = nameFilm; // set value for movie-day 

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
        document.getElementById("total").innerHTML = "$" + parseFloat(total).toFixed(2) // format: X.ab
}

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
    $('#cust-Expiry-month').val(' ');
    $('#cust-Expiry-year').val(' ');
}



//  Avengers button
document.getElementById("myBtn").addEventListener("click", function () { showFilminfo(movieInfo['Name'][0], movieInfo['Day'][2], movieInfo['Time'][3], movieInfo['Id'][0]); Reset() });

document.getElementById("myBtn1").addEventListener("click", function () { showFilminfo(movieInfo['Name'][0], movieInfo['Day'][4], movieInfo['Time'][3], movieInfo['Id'][0]); Reset() });

document.getElementById("myBtn2").addEventListener("click", function () { showFilminfo(movieInfo['Name'][0], movieInfo['Day'][5], movieInfo['Time'][2], movieInfo['Id'][0]); Reset() });

document.getElementById("myBtn3").addEventListener("click", function () { showFilminfo(movieInfo['Name'][0], movieInfo["Day"][6], movieInfo['Time'][2], movieInfo['Id'][0]); Reset() });

document.getElementById("myBtn4").addEventListener("click", function () { showFilminfo(movieInfo['Name'][0], movieInfo["Day"][3], movieInfo['Time'][3], movieInfo['Id'][0]); Reset() });

// Top end wedding button
document.getElementById("myBtna").addEventListener("click", function () { showFilminfo(movieInfo['Name'][1], movieInfo['Day'][0], movieInfo['Time'][2], movieInfo['Id'][1]); Reset() });

document.getElementById("myBtn1a").addEventListener("click", function () { showFilminfo(movieInfo['Name'][1], movieInfo['Day'][1], movieInfo['Time'][2], movieInfo['Id'][1]); Reset() });

document.getElementById("myBtn2a").addEventListener("click", function () { showFilminfo(movieInfo['Name'][1], movieInfo['Day'][5], movieInfo['Time'][1], movieInfo['Id'][1]); Reset() });

document.getElementById("myBtn3a").addEventListener("click", function () { showFilminfo(movieInfo['Name'][1], movieInfo['Day'][6], movieInfo['Time'][1], movieInfo['Id'][1]); Reset() });

//  Dumbo button
document.getElementById("myBtnb").addEventListener("click", function () { showFilminfo(movieInfo['Name'][2], movieInfo['Day'][0], movieInfo['Time'][4], movieInfo['Id'][2]); Reset() });

document.getElementById("myBtn1b").addEventListener("click", function () { showFilminfo(movieInfo['Name'][2], movieInfo['Day'][1], movieInfo['Time'][4], movieInfo['Id'][2]); Reset() });

document.getElementById("myBtn2b").addEventListener("click", function () { showFilminfo(movieInfo['Name'][2], movieInfo['Day'][2], movieInfo['Time'][2], movieInfo['Id'][2]); Reset() });

document.getElementById("myBtn3b").addEventListener("click", function () { showFilminfo(movieInfo['Name'][2], movieInfo['Day'][4], movieInfo['Time'][2], movieInfo['Id'][2]); Reset() });

document.getElementById("myBtn4b").addEventListener("click", function () { showFilminfo(movieInfo['Name'][2], movieInfo['Day'][5], movieInfo['Time'][4], movieInfo['Id'][2]); Reset() });

document.getElementById("myBtn5b").addEventListener("click", function () { showFilminfo(movieInfo['Name'][2], movieInfo['Day'][6], movieInfo['Time'][4], movieInfo['Id'][2]); Reset() });

document.getElementById("myBtn6b").addEventListener("click", function () { showFilminfo(movieInfo['Name'][2], movieInfo['Day'][3], movieInfo['Time'][4]), movieInfo['Id'][2]; Reset() });

//  Happy prince button
document.getElementById("myBtnc").addEventListener("click", function () { showFilminfo(movieInfo['Name'][3], movieInfo['Day'][2], movieInfo['Time'][4], movieInfo['Id'][3]); Reset() });

document.getElementById("myBtn1c").addEventListener("click", function () { showFilminfo(movieInfo['Name'][3], movieInfo['Day'][4], movieInfo['Time'][4], movieInfo['Id'][3]); Reset() });

document.getElementById("myBtn2c").addEventListener("click", function () { showFilminfo(movieInfo['Name'][3], movieInfo['Day'][5], movieInfo['Time'][3], movieInfo['Id'][3]); Reset() });

document.getElementById("myBtn3c").addEventListener("click", function () { showFilminfo(movieInfo['Name'][3], movieInfo['Day'][6], movieInfo['Time'][3], movieInfo['Id'][3]); Reset() });

document.getElementById("myBtn4c").addEventListener("click", function () { showFilminfo(movieInfo['Name'][3], movieInfo['Day'][3], movieInfo['Time'][4], movieInfo['Id'][3]); Reset() });




// must select the date and time to book the ticket
// var validateForm = document.getElementById("booking")

validateForm.addEventListener('submit', function (a) {
    if (document.getElementById("formDay").innerHTML == "Day") {
        a.preventDefault();
        alert("You have to choose the date and time to book the ticket")
    }
});

// Must select a movie
validateForm.addEventListener('submit', function (b) {
    if (document.getElementById("formTitle").innerHTML == "") {
        b.preventDefault();
        alert("You have to choose a movie to book the ticket")
    }
});


// choose at least one seat to submit the booking form
validateForm.addEventListener('submit', function (e) {
    if (document.getElementById('total').innerText == 0 || document.getElementById('total').innerText == "$0.00") {
        e.preventDefault()
        alert("Please select the amount of ticket. At least 1 ticket must be chosen to order")
    }
})

// format expiry date
var firstMonth = 1;
select1 = document.getElementById('cust-Expiry-month');

var currentYear = new Date().getFullYear();
var totalYear = currentYear + 5;
select = document.getElementById('cust-Expiry-year');

for (var i = currentYear; i <= totalYear; i++) {
    var opt = document.createElement('option');
    opt.value = i;
    opt.innerHTML = i;
    select.appendChild(opt);
}

for (var i = firstMonth; i <= 12; i++) {
    if (i < 10) {
        i = '0' + i;
        var opt1 = document.createElement('option');
        opt1.value = i;
        opt1.innerHTML = i;
        select1.appendChild(opt1);
    }
    else {
        var opt1 = document.createElement('option');
        opt1.value = i;
        opt1.innerHTML = i;
        select1.appendChild(opt1);
    }
}
// Get current month, year
// check expiry time whether in the future or not
validateForm.addEventListener('submit', function (a) {
    var selectedMonth = document.getElementById('cust-Expiry-month').value
    var selectedYear = document.getElementById('cust-Expiry-year').value
    var currentMonth = new Date().getMonth() + 1
    if (parseInt(selectedYear) == currentYear) {
        if (parseInt(selectedMonth) < currentMonth) {
            a.preventDefault()
            alert("Please choose the month in the future only")
        }
    }
})
