//get specific cookies
function getCookie(cName) {
    const name = cName + "=";
    const cDecoded = decodeURIComponent(document.cookie); //to be careful
    const cArr = cDecoded.split('; ');
    let res;
    cArr.forEach(val => {
        if (val.indexOf(name) === 0) res = val.substring(name.length);
    })
    return res
}
//setting cookies
function set_cookie(cookiename, cookievalue, hours) {
    var date = new Date();
    date.setTime(date.getTime() + Number(hours) * 3600 * 1000);
    document.cookie = cookiename + "=" + cookievalue + "; path=/;expires = " + date.toGMTString();
}
// Add number to cookies
function cookiesAddNumber(phoneNumber){
    // setting cookie
    if (getCookie("verifiedNumbers") == null) { var verifiedNumbers = [];}
    else { var verifiedNumbers = JSON.parse(getCookie("verifiedNumbers"));}
    if(!verifiedNumbers.includes(phoneNumber)){verifiedNumbers.push(phoneNumber);}// add if not duplicated
    var jsonPhoneNumber = JSON.stringify(verifiedNumbers); // convert to json
    set_cookie("verifiedNumbers", jsonPhoneNumber, 24*30); // 30 days
}
//return true if phone number is in the cookies and false if phone number isn't in the cookies or empty
function phoneInCookies(phoneNumber){
    if (getCookie("verifiedNumbers") == null) { return false}
    else { var verifiedNumbers = JSON.parse(getCookie("verifiedNumbers"));
        if(!verifiedNumbers.includes(phoneNumber)){return true;}
        else{ return false;}
    }
}



// console.log(getCookie("verifiedNumbers"));