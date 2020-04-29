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

document.getElementById('myBtn').onclick = function () { myFunction() };
document.getElementById('myBtn1').onclick = function () { myFunction1() };
document.getElementById('myBtn2').onclick = function () { myFunction2() };
document.getElementById('myBtn3').onclick = function () { myFunction3() };


// toggle là nó xóa class nếu đã có, và thêm class nếu chưa có 
// ý tưởng: đầu tiên là vi mỗi phim, lưu danh sách suất chiếu và nội dung chi tiết vào mảng (2 chiều hoặc thế nào đó )
// thứ 2 là dùng for để tạo mấy cái nut đó tdưa vào mảng, mỗi nút có 1 cái id riêng (gợi ý id ựa trên chỉ số của phim đó trong mảng)
// Viết 1 cái hàm chung, haowjc sửa lại hàm show phim này cũng được.
// truyền vào đó id của suất chiếu trong mảng, rồi từ cái hàm này lấy trong mảng ra (y)

function showFilm(nameFilm = "") {
    if (!document.getElementById('booking').classList.contains("show")) {
        document.getElementById('booking').classList.add("show");
    }
    document.getElementById('formTitleDayTime').innerHTML = nameFilm;
}
function myFunction() {
    showFilm('Avenger Endgame - Wednesday - 9pm');

}
function myFunction1() {
    showFilm('Avenger Endgame - Friday - 9pm');
}
function myFunction2() {
    showFilm('Avenger Endgame - Saturday - 6pm');
}

function myFunction3() {
    showFilm('Avenger Endgame - Sunday - 6pm');
}


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

