<!doctype html>
<html>
<head></head>
<style>
body {
    background-color: #f5f5f5;
    /* overflow-x: hidden; */
}
.wapper {
    width: 100%;
    table-layout: fixed;
    background-color: #f5f5f5;
    padding: 100px 0px;
}
.webkit {
    width: 100%;
    max-width: 900px;
    background-color: white;
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
    background: white;
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
    background: white;
}
.img_two {
    padding-top: 10%;
}
p {
    font-size: 18px;
    font-family: 'Raleway', sans-serif;
    padding: 0 10%;
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
.line {
    /* border: 1px solid #E0DDDD; */
    /* width: 800px; */
}
.borderRadius {
    border-radius: 20px !important;
}
.enquiry_class {
    font-size: 18px;
    font-weight: 700;
}
.sharing_details {
    font-family: Mulish;
    font-style: normal;
    font-weight: normal;
    font-size: 14px;
    line-height: 28px;
    text-align: center;
    color: #566F86;
}
.image_popUp {
    width: 20%;
}
.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgb(0, 0, 0);
    background-color: rgba(0, 0, 0, 0.4);
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 9% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 44%;
}

/* The Close Button */
.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}
.yellow_color {
    color: #F3B021;
    font-size: 14px;
}
.btn_pop {
    background: #FFFFFF;
    border: 1px solid #393185;
    box-sizing: border-box;
    font-family: Poppins;
    font-style: normal;
    font-weight: 600;
    font-size: 19px;
    color: #393185;
    border-radius: 40px;
}

@media only screen and (max-width: 767px) {
    .webkit {
        width: 100%;
        /* margin-left: -30px; */
    }

    .tableOne {
        padding: 0px;
        padding-top: 10%;
        padding-bottom: 5%;
    }

    .wapper {
        max-width: 500px;
        width: 100%;
        padding: 20px 0px;
    }

    .img_two {
        padding-top: 10%;
        width: 21%;
    }

    .image_popUp {
        width: 28%;
    }

    .btn_pop {
        font-size: 14px;
    }

    p {
        font-size: 14px !important;
    }

    .button {
        font-size: 11px;
    }

    .modal-content {
        width: 94%;
    }

}

@media only screen and (min-width: 767px) and (max-width:770px) {
    .webkit {
        width: 100%;
        /* margin-left: -30px; */
    }

    .wapper {
        max-width: 100%;
        width: 100%;
        padding: 0px;
    }

    .img_two {
        padding-top: 10%;
        width: 18%;
    }

    p {
        font-size: 14px !important;
    }

    .button {
        font-size: 11px;
    }

    .modal-content {
        width: 67%;
    }

    .btn_pop {
        font-size: 14px;
    }
}
</style>

<body>
    <!-- email-start -->
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
                        <p class="content-left">Hi, {{ $first_name.' '.$last_name }}</p>
                        <p class="content_two">We want to verify that you are indeed {{ $first_name.' '.$last_name }}.</p>
                        <p class="content_three">Verifying this email address will let you receive notifications and
                            important communications from Credit
                            Triangle</p>
                        <a href="{{ $url }}"><button class="button" type="button" id="myBtn">VERIFY YOUR
                            MAIL</button></a>

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
    <!-- email-end -->



   
</body>