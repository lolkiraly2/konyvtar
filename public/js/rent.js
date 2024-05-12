console.log('működök az új kölcsönzésbe');

function maxbook(type) {
    switch (type) {
        case 'student':
            return 5;
        case 'professor':
            return 0;
        case 'fromElsewhere':
            return 4;
        case 'other':
            return 2;
    }
}

function rentdays(type) {
    switch (type) {
        case 'student':
            return 60;
        case 'professor':
            return 365;
        case 'fromElsewhere':
            return 30;
        case 'other':
            return 14;
    }
}

function SetExpireDate(type) {
    let d = new Date();
    //console.log("now: " + d)
    d.setDate(d.getDate() + rentdays(type))
    // console.log(d)
    let sd = d.toISOString().split('T')[0]
    return sd
}

function CanRent(type, booknumber) {
    // if(type === "professor") return true
    if (maxbook(type) >= booknumber + 1) return true
    else return false
}

function remainrents(type, booknumber) {
    return maxbook(type) - booknumber;
}