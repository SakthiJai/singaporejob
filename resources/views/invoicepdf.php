<div class="container">
    <div class="card">
        <div class="card-body">
            <div id="invoice">
             
                <div class="invoice overflow-auto">
                    <div style="min-width: 600px">
                        <header>
                            <div class="row">
							<div class="col company-details">
                                    <h2 class="name">
                                        <a target="_blank" href="javascript:;">
									Arboshiki
									</a>
                                    </h2>
                                    <div>455 Foggy Heights, AZ 85004, US</div>
                                    <div>(123) 456-789</div>
                                    <div>company@example.com</div>
                                </div>
                                <div class="col">
                                    <a href="javascript:;">
    												<img src="http://localhost/ims/assets/images/frame.jpg" style="margin-top: -94px;">
												</a>
                                </div>
                            </div>
                        </header>
                        <main>
                            <div class="row contacts">
                                <div class="col invoice-to">
                                    <div class="text-gray-light">TO:</div>
                                    <h2 class="to">John Doe</h2>
                                    <div class="address">796 Silver Harbour, TX 79273, US</div>
                                    <div class="email"><a href="mailto:john@example.com">john@example.com</a>
                                    </div>
                                </div>
                                <div class="col invoice-details">
                                    <h1 class="invoice-id">INVOICE </h1>
                                    <div class="date">Date of Invoice: 01/10/2018</div>
                                    <div class="date">Due Date: 30/10/2018</div>
                                </div>
                            </div>
                            <table>
                                <thead style="
    border-top: 1px solid #aaa;
    border-left: 1px solid #aaa;
    border-right: 1px solid #aaa;">
                                    <tr>
                                        <th>S.NO</th>
                                        <th class="text-left">Product</th>
                                        <th class="text-right">Qty</th>
                                        <th class="text-right">Rate</th>
                                        <th class="text-right">Amount</th>
                                    </tr>
                                </thead>
                                <tbody style="
    border-top: 1px solid #aaa;
    border-left: 1px solid #aaa;
    border-right: 1px solid #aaa;
    border-bottom: 1px solid #aaa;">
                                    <tr>
                                        <td class="no">1</td>
                                        <td class="text-left">
                                            <h3>
                                                <a target="_blank" href="javascript:;">
										Youtube channel
										</a>
                                            </h3>
                                            <a target="_blank" href="javascript:;">
										   Useful videos
									   </a> to improve your Javascript skills. Subscribe and stay tuned :)</td>
                                        <td class="unit">$0.00</td>
                                        <td class="qty">100</td>
                                        <td class="total">$0.00</td>
                                    </tr>
                                    <tr>
                                        <td class="no">2</td>
                                        <td class="text-left">
                                            <h3>Website Design</h3>Creating a recognizable design solution based on the company's existing visual identity</td>
                                        <td class="unit">$40.00</td>
                                        <td class="qty">30</td>
                                        <td class="total">$1,200.00</td>
                                    </tr>
                                    <tr>
                                        <td class="no">3</td>
                                        <td class="text-left">
                                            <h3>Website Development</h3>Developing a Content Management System-based Website</td>
                                        <td class="unit">$40.00</td>
                                        <td class="qty">80</td>
                                        <td class="total">$3,200.00</td>
                                    </tr>
                                    <tr>
                                        <td class="no">4</td>
                                        <td class="text-left">
                                            <h3>Search Engines Optimization</h3>Optimize the site for search engines (SEO)</td>
                                        <td class="unit">$40.00</td>
                                        <td class="qty">20</td>
                                        <td class="total">$800.00</td>
                                    </tr>
                                </tbody>
                            </table>
							<div class="col-xs-6 text-right pull-right invoice-total" style="text-align:right;">
					  <p>
                       Gross Amount : $1019</p>
			          <p>S - Charge 13 % : $101 </p>
			          <p>
                     Vat - Charge 10 % : 56 </p>
			          <p>Discount : 78</p>
					  <p>Net Amount: 56</p>
			</div>
                            <div class="thanks">Thank you!</div>
                            
                        </main>
                    </div>
                    <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                    <div></div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
body{margin-top:20px;
background-color: #f7f7ff;
}
#invoice {
    padding: 0px;
}

.invoice {
    position: relative;
    min-height: 680px;
    padding: 15px
}

.invoice header {
    padding: 10px 0;
    margin-bottom: 20px;
    border-bottom: solid 1px #aaa;
}

.invoice .company-details {
    text-align: right
}

.invoice .company-details .name {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .contacts {
    margin-bottom: 20px
}

.invoice .invoice-to {
    text-align: left
}

.invoice .invoice-to .to {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .invoice-details {
    text-align: right
}

.invoice .invoice-details .invoice-id {
    margin-top: -74px;
  font-size: 20px;
	
}

.invoice main {
    padding-bottom: 50px
}

.invoice main .thanks {
    margin-top: -100px;
    font-size: 2em;
    margin-bottom: 50px
}

.invoice main .notices {
    padding-left: 6px;
    border-left: 6px solid #0d6efd;
    background: #e7f2ff;
    padding: 10px;
}

.invoice main .notices .notice {
    font-size: 1.2em
}

.invoice table {

    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px;
	font-size:10px;
}

.invoice table td,
.invoice table th {
    padding: 15px;
   
}

.invoice table th {
    white-space: nowrap;
    font-weight: 400;
    font-size: 16px
}

.invoice table td h3 {
    margin: 0;
    font-weight: 400;
    color: #0d6efd;
    font-size: 1.2em
}

.invoice table .qty,
.invoice table .total,
.invoice table .unit {
    text-align: right;
    font-size: 1.2em
}

.invoice table .no {
    background: white
}

.invoice table .unit {
  
}

.invoice table .total {
}

.invoice table tbody tr:last-child td {
    border: none
}

.invoice table tfoot td {
    background: 0 0;
    border-bottom: none;
    white-space: nowrap;
    text-align: right;
    padding: 10px 20px;
    font-size: 1.2em;
    border-top: 1px solid #aaa
}

.invoice table tfoot tr:first-child td {
    border-top: none
}
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0px solid rgba(0, 0, 0, 0);
    border-radius: .25rem;
    margin-bottom: 1.5rem;
    box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
}

.invoice table tfoot tr:last-child td {
    color: #0d6efd;
    font-size: 1.4em;
    border-top: 1px solid #0d6efd
}

.invoice table tfoot tr td:first-child {
    border: none
}

.invoice footer {
    width: 100%;
    text-align: center;
    color: #777;
    border-top: 1px solid #aaa;
    padding: 8px 0
}

@media print {
    .invoice {
        font-size: 11px !important;
        overflow: hidden !important
    }
    .invoice footer {
        position: absolute;
        bottom: 10px;
        page-break-after: always
    }
    .invoice>div:last-child {
        page-break-before: always
    }
}

.invoice main .notices {
    padding-left: 6px;
    border-left: 6px solid #0d6efd;
    background: #e7f2ff;
    padding: 10px;
}
</style>