<!doctype html>
<html>
<head></head>
<style>
body {
    background-color: #f5f5f5;

}

.wapper {
    width: 100%;
    table-layout: fixed;
    background-color: #f5f5f5;
    padding: 100px 0px;
}

.webkit {
    width: 110%;
    max-width: 900px;
    background-color: white;
}

@media (max-width:425px) {
    .webkit {
        width: 100%;
        margin-left: -30px;
    }

    .wapper {
        max-width: 500px;
        width: 110%;
        padding: 20px 0px;
    }

    .content-left {
        text-align: left;
        margin-top: 10%;
    }

    .content_two {
        margin-top: 5%;
    }

    .content_three {
        margin-top: 100%;
    }

}

.tableOne {
    width: 100%;
    border-spacing: 0;
    padding: 35px;
    width: 900px;
    box-shadow: 0px 1px 10px 0px rgb(233, 232, 232);
    justify-content: center;
    text-align: center;
    align-items: center;
}

.img_one {
    justify-content: center;
    text-align: center;
    align-items: center;
}

.tableTwo {
    justify-content: center;
    text-align: center;
    align-items: center;
}

.img_two {
    padding-top: 10%;
}

p {
    font-size: 18px;
    font-family: 'Raleway', sans-serif;
    padding: 0 10%;
}

.strong {
    font-style: bold;
    font-weight: 600;
}

.content-left {
    text-align: left;
    margin-top: 5%;
}

.content_two {
    margin-top: 2%;
}

.content_three {
    margin-top: 5%;
}

.button {
    background-color: white;
    color: #393185;
    font-size: 16px;
    font-weight: 500;
    border: 2px solid #625c97;
    border-radius: 1px;
    padding: 10px 35px;
}

.content_four {
    margin: 5% 0%;
    color: #f3b021;
    font-size: 18px;
}

.content_five {
    padding-bottom: 20px;
}
</style>

<body>
    <center class="wapper" style="width:100%;table-layout:fixed;background-color:#f5f5f5;padding:100px 0px">
        <div class="webkit" style="width:110%;max-width:900px;background-color:white">
            <table class="outer">
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td class="tableOne">
                                    <img class="img_one" src="http://dev.credittriangle.com/assets/img/email_logo.png"
                                        class="bg-white img-fluid img-responsive" alt="email-logo">
                                </td>
                            </tr>
                        </table>

                    </td>
                </tr>
                <tr>
                    <td class="tableTwo">
                        <img class="img_two" src="http://dev.credittriangle.com/assets/img/email1.png" bg-white
                            class="bg-white img-fluid img-responsive" alt="email_banner">
                        <p class="content-left">Hi, <span class="strong">{{ $first_name.' '.$last_name }}</span> </p>
                        <p class="content_two">Thank you for registering at credittriangle.com. Your account was created
                            with a mobile number ending
                            with <XXXX>
                        </p>
                        <p class="content_three">Click here to verify your email id to further secure your account.
                        </p>
                        <a href="{{ $url }}"><button class="button">VERIFY YOUR MAIL</button></a>
                        <p class="content_three">Credit Triangle is an online platform to monitor, maintain and improve
                            your credit score. We make credit
                            simple. We not only focus on improving our client’s credit score but help them make a better
                            applicant
                            by working on areas that positively impact their credit health. </p>
                        <p class="content_three">Wondering why you got this email?
                        </p>
                        <p>It's sent when someone creates an account with us at credittriangle.com as a contact email
                            address.
                        </p>
                        <p>Thanks,​</p>
                        <p class="content_four">Credit Triangle Customer Support </p>
                        <hr class="line">
                        <p class="content_five">@2020 CREDIFY ADVISORY SERVICES PRIVATE LIMITED . All Rights Reserved
                        </p>
                    </td>

                </tr>
            </table>
        </div>
    </center>
</body>