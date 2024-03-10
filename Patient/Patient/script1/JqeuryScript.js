$(function(){
    $(".pr-password").passwordRequirements();
    });
    $(".pr-password").passwordRequirements({
    numCharacters: 8,
    useLowercase:true,
    useUppercase:true,
    useNumbers:true,
    useSpecial:true
    });
    $(".pr-password").passwordRequirements({
    style:"dark"
    });
    $(".pr-password").passwordRequirements({
    fadeTime: 500
    });