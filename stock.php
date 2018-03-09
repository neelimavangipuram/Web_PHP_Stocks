<!DOCTYPE HTML>
<html> 
    <head>
        <meta charset="utf-8"/>
        <style>
            #myDiv {
                width: 500px;
                height: 200px;
                background-color: whitesmoke;
                border-style: solid;
                border-color: darkgray;
                border-width: thin;
                margin-top: 20px;
                margin-left: auto;
                margin-right: auto;
            }
            #container {
                width: 1200px;
                height: 200px;
                background-color: whitesmoke;
                border-style: solid;
                border-color: darkgray;
                border-width: thin;
                margin-top: 20px;
                margin-left: auto;
                margin-right: auto;
            }
            #errorCointainer {
                display: 'block';
                width: 1200px;
                height: 50px;
                background-color: whitesmoke;
                border-style: solid;
                border-color: darkgray;
                border-width: thin;
                margin-top: 20px;
                margin-left: auto;
                margin-right: auto;
            }
            #mainContainer {
                display: 'block';
            }
            #heading {
                font-style: italic;
                text-align: center;
                margin-top: 2%;
                font-size: 35px;
            }
            form {
                margin-left: 10px;
                margin-top: 20px;
            }
            #line {
                margin-top: -3%;
            }
            #submit, #clear {
                border-radius: 10px;
                background: white;
                border: 1px solid gray;
                width: 80px;
                padding: 5px;
                font-weight: 200;
            }
            table {
                empty-cells: show;
            }
            table.resultTable {
                width: 1200px;
                height: 200px;
                border-collapse: collapse;
                border: 1px solid black;
                margin-left: auto;
                margin-right: auto;
            }

            table.newsTable {
                width: 1200px;
                height: 200px;
                border-collapse: collapse;
                border: 1px solid black;
                margin-left: auto;
                margin-right: auto;
            }

            table.errorTable {
                width: 1200px;
                border-collapse: collapse;
                border: 1px solid black;
                margin-left: auto;
                margin-right: auto;
            }

            table.newsTable td:nth-child(1) {
                font-family: Arial, Helvetica, sans-serif;
                font-size: 12.5px;
                border-collapse: collapse;
                background-color: ghostwhite;
                border: 1px solid darkgray;
            }

            table.resultTable td:nth-child(2) {
                font-family: Arial, Helvetica, sans-serif;
                font-size: 13px;
                border-collapse: collapse;
                background-color: #E9E9E9;
                border: 1px solid darkgray;
                text-align: center;
            }

            table.resultTable td:nth-child(1) {
                font-family: Arial, Helvetica, sans-serif;
                font-size: 12px;
                font-weight: bold;
                background-color: lightgray;
                border-collapse: collapse;
                border: 1px solid darkgray;
                width: 25%;

            }
            table.errorTable td:nth-child(2) {
                font-family: Arial, Helvetica, sans-serif;
                font-size: 13px;
                border-collapse: collapse;
                background-color: #E9E9E9;
                border: 1px solid darkgray;
                text-align: center;
            }

            table.errorTable td:nth-child(1) {
                font-family: Arial, Helvetica, sans-serif;
                font-size: 12px;
                font-weight: bold;
                background-color: lightgray;
                border-collapse: collapse;
                border: 1px solid darkgray;
                width: 25%;

            }
            img {
                width: 12px;
                height: 12px;
            }
            a:link {
                color: blue;
                text-decoration: none;
            }
            a:visited {
                color: blue;
                text-decoration: none;
            }
        </style>
    </head>
    <body>     
        <!-- HTML -->
        <div id="myDiv">
            <h2 id = "heading">Stock Search</h2>
            <hr id = "line">
            <form name="checking" method="post" id="searchForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
                <table id="formTable">
                    <tr>
                        <td id = "stockTitle">Enter Stock Ticker Symbol:*</td>
                        <td><input id="symbol" type="text" name="symbol" required oninvalid="alert('Please enter a symbol')" onchange="this.setCustomValidity('')" value="<?php echo isset($_POST['symbol']) ? $_POST['symbol'] : '' ?>" autofocus /></td> 
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input id = "submit" type="submit" value="Search" name = "submit">
                            <input id = "clear" type="button" name="submitReset" value="Clear" onclick="clearForm()">
                        </td>
                    </tr>
                    <tr></tr>
                    <tr>
                        <td>
                            <p><i>* - Mandatory Field</i></p>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <script type="text/javascript"></script>
        <script>

            function clearForm(){
                if(document.getElementById("searchForm")) {
                document.getElementById("searchForm").elements.namedItem("symbol").value = "";
                }
                if(document.getElementById("mainContainer")) {
                    document.getElementById("mainContainer").style.display = 'none';
                }
                document.getElementById("errorContainer").style.display = 'none';
            }

            function imageClicked() {
                if (document.getElementById("myImage").src == "http://cs-server.usc.edu:45678/hw/hw6/images/Gray_Arrow_Down.png") 
                {
                    document.getElementById("newsTableDiv").style.display = 'block';
                    document.getElementById("myText").innerHTML = "Click to hide stock news";
                    document.getElementById('myImage').src='http://cs-server.usc.edu:45678/hw/hw6/images/Gray_Arrow_Up.png';
                }
                else 
                {
                    document.getElementById("newsTableDiv").style.display = 'none';
                    document.getElementById("myText").innerHTML = "Click to show stock news";
                    document.getElementById('myImage').src='http://cs-server.usc.edu:45678/hw/hw6/images/Gray_Arrow_Down.png';
                }

            }

            function createURL(e) {
                var priceDiv = document.getElementById('priceContainer');
                var smaDiv = document.getElementById('smaContainer');
                var emaDiv = document.getElementById('emaContainer');
                var stochDiv = document.getElementById('stochContainer');
                var rsiDiv = document.getElementById('rsiContainer');
                var adxDiv = document.getElementById('adxContainer');
                var cciDiv = document.getElementById('cciContainer');
                var bbandsDiv = document.getElementById('bbandsContainer');
                var macdDiv = document.getElementById('macdContainer');

                var technicalIndicator = e.getAttribute("value");
                var url = "";
                if(technicalIndicator == 'STOCH'){

                    url  = "https://www.alphavantage.co/query?function=STOCH&symbol=<?php echo $_POST['symbol']; ?>&interval=daily&slowkmatype=1&slowdmatype=1&apikey=7VDD3ZWMAFBQZD4B";

                } else if(technicalIndicator == 'BBANDS') {

                    url =  "https://www.alphavantage.co/query?function=BBANDS&symbol=<?php echo $_POST['symbol']; ?>&interval=daily&time_period=5&series_type=close&nbdevup=3&nbdevdn=3&apikey=7VDD3ZWMAFBQZD4B";
                } else {
                    url = "https://www.alphavantage.co/query?function=" + technicalIndicator + "&symbol=<?php echo $_POST['symbol']; ?>&interval=daily&time_period=10&series_type=close&apikey=7VDD3ZWMAFBQZD4B";
                }

                console.log('URL', url);

                var getJSON = function(url, callback) {
                    var xhr = new XMLHttpRequest();
                    xhr.open('get', url, false);
                    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xhr.onreadystatechange = function() {
                        var status = xhr.status;
                        if (xhr.readyState === XMLHttpRequest.DONE) {
                            if (status == 200) {
                                var response = JSON.parse(xhr.responseText);
                                callback(null,  response);
                            } else {
                                callback(status);
                            }
                        }
                    };
                    xhr.send();
                };
                getJSON(url, function(err, data) {
                    if(technicalIndicator == 'Price') {
                        priceDiv.style.display = 'block';
                        smaDiv.style.display = 'none';
                        emaDiv.style.display = 'none';
                        stochDiv.style.display = 'none';
                        rsiDiv.style.display = 'none';
                        adxDiv.style.display = 'none';
                        cciDiv.style.display = 'none';
                        bbandsDiv.style.display = 'none';
                        macdDiv.style.display = 'none';

                    }
                    else if(technicalIndicator == 'SMA') {
                        priceDiv.style.display = 'none';
                        smaDiv.style.display = 'block';
                        emaDiv.style.display = 'none';
                        stochDiv.style.display = 'none';
                        rsiDiv.style.display = 'none';
                        adxDiv.style.display = 'none';
                        cciDiv.style.display = 'none';
                        bbandsDiv.style.display = 'none';
                        macdDiv.style.display = 'none';

                        var datesForSMA = data['Technical Analysis: SMA'];
                        var datesArray = [];
                        var smaArray = [];
                        var datesFormatted = [];
                        for(var k in datesForSMA) { 
                            datesArray.push(k);
                            smaArray.push(datesForSMA[k]['SMA']);
                        }

                        var myArray = smaArray.slice(0,120);
                        for(var i=0; i<myArray.length; i++) { myArray[i] = parseFloat(myArray[i], 10);}

                        var datesArray = datesArray.slice(0, 120);
                        for(var i = 0; i < datesArray.length; i++){
                            datesFormatted.push(datesArray[i].replace(/-/g, '\/').substring(5, datesArray[i].length));
                        }


                        //Line Chart for SMA ##########################################################################################################
                        Highcharts.chart('smaContainer', {

                            chart: {
                                borderColor: 'gray',
                                borderWidth: 1,
                                type: 'line',
                            },

                            title: {
                                text: 'Simple Moving Average (SMA)'
                            },

                            subtitle: {
                                text: 'Source: <a href="https://www.alphavantage.co/"> Alpha Vantage</a>',
                                style: {
                                    color: "#0000ff"
                                }
                            },

                            colors: ['red'],

                            xAxis: [{
                                categories: datesFormatted.reverse(),
                                crosshair: true,
                                tickInterval: 7,
                                labels: {
                                    rotation: -45
                                } 
                            }],

                            yAxis: {
                                title: {
                                    text: 'SMA'
                                }
                            },
                            legend: {
                                layout: 'vertical',
                                align: 'right',
                                verticalAlign: 'middle'
                            },

                            plotOptions: {
                                series: {
                                    label: {
                                        connectorAllowed: false
                                    }
                                }
                            },
                            
                            tooltip: {
                                pointFormat: "Value: {point.y:.2f}"
                            },

                            series: [{
                                type: 'line',
                                name: '<?php echo $_POST['symbol'];?>',
                                data: myArray
                            }],

                            responsive: {
                                rules: [{
                                    condition: {
                                        maxWidth: 500
                                    },
                                    chartOptions: {
                                        legend: {
                                            layout: 'horizontal',
                                            align: 'center',
                                            verticalAlign: 'bottom'
                                        }
                                    }
                                }]
                            }

                        });

                    } else if(technicalIndicator == 'EMA'){
                        priceDiv.style.display = 'none';
                        smaDiv.style.display = 'none';
                        emaDiv.style.display = 'block';
                        stochDiv.style.display = 'none';
                        rsiDiv.style.display = 'none';
                        adxDiv.style.display = 'none';
                        cciDiv.style.display = 'none';
                        bbandsDiv.style.display = 'none';
                        macdDiv.style.display = 'none';

                        var datesForEMA = data['Technical Analysis: EMA'];
                        var datesArrayEMA = [];
                        var emaArray = [];
                        var datesFormattedEMA = [];
                        for(var k in datesForEMA) { 
                            datesArrayEMA.push(k);
                            emaArray.push(datesForEMA[k]['EMA']);
                        }

                        var myEmaArray = emaArray.slice(0,120);
                        for(var i=0; i<myEmaArray.length; i++) { myEmaArray[i] = parseFloat(myEmaArray[i], 10);}

                        var datesArrayEMA = datesArrayEMA.slice(0, 120);
                        for(var i = 0; i < datesArrayEMA.length; i++){
                            datesFormattedEMA.push(datesArrayEMA[i].replace(/-/g, '\/').substring(5, datesArrayEMA[i].length));
                        }

                        //Line Chart for EMA ##########################################################################################################
                        Highcharts.chart('emaContainer', {

                            chart: {
                                borderColor: 'gray',
                                borderWidth: 1,
                                type: 'line',
                            },

                            title: {
                                text: 'Exponential Moving Average (EMA)'
                            },

                            subtitle: {
                                text: 'Source: <a href="https://www.alphavantage.co/"> Alpha Vantage</a>',
                                style: {
                                    color: "#0000ff"
                                }
                            },

                            colors: ['red'],

                            xAxis: [{
                                categories: datesFormattedEMA.reverse(),
                                crosshair: true,
                                tickInterval: 7,
                                labels: {
                                    rotation: -45
                                } 
                            }],

                            yAxis: {
                                title: {
                                    text: 'EMA'

                                }
                            },
                            legend: {
                                layout: 'vertical',
                                align: 'right',
                                verticalAlign: 'middle'
                            },

                            plotOptions: {
                                series: {
                                    label: {
                                        connectorAllowed: false
                                    }
                                }
                            },

                            tooltip: {
                                pointFormat: "Value: {point.y:.2f}"
                            },
                            
                            series: [{
                                type: 'line',
                                name: '<?php echo $_POST['symbol'];?>',
                                data: myEmaArray
                            }],

                            responsive: {
                                rules: [{
                                    condition: {
                                        maxWidth: 500
                                    },
                                    chartOptions: {
                                        legend: {
                                            layout: 'horizontal',
                                            align: 'center',
                                            verticalAlign: 'bottom'
                                        }
                                    }
                                }]
                            }

                        });

                    } else if(technicalIndicator == 'STOCH'){
                        priceDiv.style.display = 'none';
                        smaDiv.style.display = 'none';
                        emaDiv.style.display = 'none';
                        stochDiv.style.display = 'block';
                        rsiDiv.style.display = 'none';
                        adxDiv.style.display = 'none';
                        cciDiv.style.display = 'none';
                        bbandsDiv.style.display = 'none';
                        macdDiv.style.display = 'none';

                        var datesForSTOCH = data['Technical Analysis: STOCH'];
                        var datesArraySTOCH = [];
                        var slowD = [];
                        var slowK = [];
                        var datesFormattedSTOCH = [];
                        for(var k in datesForSTOCH) { 
                            datesArraySTOCH.push(k);
                            slowD.push(datesForSTOCH[k]['SlowD']);
                            slowK.push(datesForSTOCH[k]['SlowK']);
                        }

                        console.log('datesArraySTOCH', datesArraySTOCH);
                        var mySlowDArray = slowD.slice(0,120);
                        for(var i = 0; i < mySlowDArray.length; i++) { mySlowDArray[i] = parseFloat(mySlowDArray[i], 10);}

                        var mySlowKArray = slowK.slice(0,120);
                        for(var i = 0; i < mySlowKArray.length; i++) { mySlowKArray[i] = parseFloat(mySlowKArray[i], 10);}

                        var datesArraySTOCH = datesArraySTOCH.slice(0, 120);
                        for(var i = 0; i < datesArraySTOCH.length; i++){
                            datesFormattedSTOCH.push(datesArraySTOCH[i].replace(/-/g, '\/').substring(5, datesArraySTOCH[i].length));
                        }


                        //Line Chart for STOCH ##########################################################################################################
                        Highcharts.chart('stochContainer', {

                            chart: {
                                borderColor: 'gray',
                                borderWidth: 1,
                                type: 'line',
                            },

                            title: {
                                text: 'Stochastic (STOCH)'
                            },

                            subtitle: {
                                text: 'Source: <a href="https://www.alphavantage.co/"> Alpha Vantage</a>',
                                style: {
                                    color: "#0000ff"
                                }
                            },

                            colors: ['red', 'green'],

                            xAxis: [{
                                categories: datesFormattedSTOCH.reverse(),
                                crosshair: true,
                                tickInterval: 7,
                                labels: {
                                    rotation: -45
                                } 
                            }],

                            yAxis: {
                                title: {
                                    text: 'STOCH'

                                }
                            },
                            legend: {
                                layout: 'vertical',
                                align: 'right',
                                verticalAlign: 'middle'
                            },

                            plotOptions: {
                                series: {
                                    label: {
                                        connectorAllowed: false
                                    }
                                }
                            },
                            
                            tooltip: {
                                pointFormat: "Value: {point.y:.2f}"
                            },

                            series: [{
                                type: 'line',
                                name: '<?php echo $_POST['symbol'].' SlowD';?>',
                                data: mySlowDArray
                            }, {
                                type: 'line',
                                name: '<?php echo $_POST['symbol'].' SlowK';?>',
                                data: mySlowKArray
                            }],

                            responsive: {
                                rules: [{
                                    condition: {
                                        maxWidth: 500
                                    },
                                    chartOptions: {
                                        legend: {
                                            layout: 'horizontal',
                                            align: 'center',
                                            verticalAlign: 'bottom'
                                        }
                                    }
                                }]
                            }

                        });



                    } else if(technicalIndicator == 'RSI') {
                        priceDiv.style.display = 'none';
                        smaDiv.style.display = 'none';
                        emaDiv.style.display = 'none';
                        stochDiv.style.display = 'none';
                        rsiDiv.style.display = 'block';
                        adxDiv.style.display = 'none';
                        cciDiv.style.display = 'none';
                        bbandsDiv.style.display = 'none';
                        macdDiv.style.display = 'none';

                        var datesForRSI = data['Technical Analysis: RSI'];
                        var datesArrayRSI = [];
                        var RSIArray = [];
                        var datesFormattedRSI = [];
                        for(var k in datesForRSI) { 
                            datesArrayRSI.push(k);
                            RSIArray.push(datesForRSI[k]['RSI']);
                        }

                        var myRSIArray = RSIArray.slice(0,120);
                        for(var i=0; i<myRSIArray.length; i++) { myRSIArray[i] = parseFloat(myRSIArray[i], 10);}

                        var datesArrayRSI = datesArrayRSI.slice(0, 120);
                        for(var i = 0; i < datesArrayRSI.length; i++){
                            datesFormattedRSI.push(datesArrayRSI[i].replace(/-/g, '\/').substring(5, datesArrayRSI[i].length));
                        }

                        //Line Chart for RSI ##########################################################################################################
                        Highcharts.chart('rsiContainer', {

                            chart: {
                                borderColor: 'gray',
                                borderWidth: 1,
                                type: 'line',
                            },

                            title: {
                                text: 'Relative Strength Index (RSI)'
                            },

                            subtitle: {
                                text: 'Source: <a href="https://www.alphavantage.co/"> Alpha Vantage</a>',
                                style: {
                                    color: "#0000ff"
                                }
                            },

                            colors: ['red'],

                            xAxis: [{
                                categories: datesFormattedRSI.reverse(),
                                crosshair: true,
                                tickInterval: 7,
                                labels: {
                                    rotation: -45
                                } 
                            }],

                            yAxis: {
                                title: {
                                    text: 'RSI'

                                }
                            },
                            legend: {
                                layout: 'vertical',
                                align: 'right',
                                verticalAlign: 'middle'
                            },

                            plotOptions: {
                                series: {
                                    label: {
                                        connectorAllowed: false
                                    }
                                }
                            },
                            
                            tooltip: {
                                pointFormat: "Value: {point.y:.2f}"
                            },

                            series: [{
                                type: 'line',
                                name: '<?php echo $_POST['symbol'];?>',
                                data: myRSIArray
                            }],

                            responsive: {
                                rules: [{
                                    condition: {
                                        maxWidth: 500
                                    },
                                    chartOptions: {
                                        legend: {
                                            layout: 'horizontal',
                                            align: 'center',
                                            verticalAlign: 'bottom'
                                        }
                                    }
                                }]
                            }

                        });

                    } else if(technicalIndicator == 'ADX') {
                        priceDiv.style.display = 'none';
                        smaDiv.style.display = 'none';
                        emaDiv.style.display = 'none';
                        stochDiv.style.display = 'none';
                        rsiDiv.style.display = 'none';
                        adxDiv.style.display = 'block';
                        cciDiv.style.display = 'none';
                        bbandsDiv.style.display = 'none';
                        macdDiv.style.display = 'none';

                        var datesForADX = data['Technical Analysis: ADX'];
                        var datesArrayADX = [];
                        var ADXArray = [];
                        var datesFormattedADX = [];
                        for(var k in datesForADX) { 
                            datesArrayADX.push(k);
                            ADXArray.push(datesForADX[k]['ADX']);
                        }

                        var myADXArray = ADXArray.slice(0,120);
                        for(var i=0; i<myADXArray.length; i++) { myADXArray[i] = parseFloat(myADXArray[i], 10);}

                        var datesArrayADX = datesArrayADX.slice(0, 120);
                        for(var i = 0; i < datesArrayADX.length; i++){
                            datesFormattedADX.push(datesArrayADX[i].replace(/-/g, '\/').substring(5, datesArrayADX[i].length));
                        }

                        //Line Chart for ADX ##########################################################################################################
                        Highcharts.chart('adxContainer', {

                            chart: {
                                borderColor: 'gray',
                                borderWidth: 1,
                                type: 'line',
                            },

                            title: {
                                text: 'Average Directional Movement Index (ADX)'
                            },

                            subtitle: {
                                text: 'Source: <a href="https://www.alphavantage.co/"> Alpha Vantage</a>',
                                style: {
                                    color: "#0000ff"
                                }
                            },

                            colors: ['red'],

                            xAxis: [{
                                categories: datesFormattedADX.reverse(),
                                crosshair: true,
                                tickInterval: 7,
                                labels: {
                                    rotation: -45
                                } 
                            }],

                            yAxis: {
                                title: {
                                    text: 'ADX'

                                }
                            },
                            legend: {
                                layout: 'vertical',
                                align: 'right',
                                verticalAlign: 'middle'
                            },

                            plotOptions: {
                                series: {
                                    label: {
                                        connectorAllowed: false
                                    }
                                }
                            },
                            
                            tooltip: {
                                pointFormat: "Value: {point.y:.2f}"
                            },

                            series: [{
                                type: 'line',
                                name: '<?php echo $_POST['symbol'];?>',
                                data: myADXArray
                            }],

                            responsive: {
                                rules: [{
                                    condition: {
                                        maxWidth: 500
                                    },
                                    chartOptions: {
                                        legend: {
                                            layout: 'horizontal',
                                            align: 'center',
                                            verticalAlign: 'bottom'
                                        }
                                    }
                                }]
                            }

                        });


                    } else if(technicalIndicator == 'CCI') {
                        priceDiv.style.display = 'none';
                        smaDiv.style.display = 'none';
                        emaDiv.style.display = 'none';
                        stochDiv.style.display = 'none';
                        rsiDiv.style.display = 'none';
                        adxDiv.style.display = 'none';
                        cciDiv.style.display = 'block';
                        bbandsDiv.style.display = 'none';
                        macdDiv.style.display = 'none';

                        var datesForCCI = data['Technical Analysis: CCI'];
                        var datesArrayCCI = [];
                        var CCIArray = [];
                        var datesFormattedCCI = [];
                        for(var k in datesForCCI) { 
                            datesArrayCCI.push(k);
                            CCIArray.push(datesForCCI[k]['CCI']);
                        }

                        var myCCIArray = CCIArray.slice(0,120);
                        for(var i=0; i<myCCIArray.length; i++) { myCCIArray[i] = parseFloat(myCCIArray[i], 10); }

                        var datesArrayCCI = datesArrayCCI.slice(0, 120);
                        for(var i = 0; i < datesArrayCCI.length; i++){
                            datesFormattedCCI.push(datesArrayCCI[i].replace(/-/g, '\/').substring(5, datesArrayCCI[i].length));
                        }

                        //Line Chart for CCI ##########################################################################################################
                        Highcharts.chart('cciContainer', {

                            chart: {
                                borderColor: 'gray',
                                borderWidth: 1,
                                type: 'line',
                            },

                            title: {
                                text: 'Average Directional Movement Index (CCI)'
                            },

                            subtitle: {
                                text: 'Source: <a href="https://www.alphavantage.co/"> Alpha Vantage</a>',
                                style: {
                                    color: "#0000ff"
                                }
                            },

                            colors: ['red'],

                            xAxis: [{
                                categories: datesFormattedCCI.reverse(),
                                crosshair: true,
                                tickInterval: 7,
                                labels: {
                                    rotation: -45
                                } 
                            }],

                            yAxis: {
                                title: {
                                    text: 'CCI'

                                }
                            },
                            legend: {
                                layout: 'vertical',
                                align: 'right',
                                verticalAlign: 'middle'
                            },

                            plotOptions: {
                                series: {
                                    label: {
                                        connectorAllowed: false
                                    }
                                }
                            },
                            tooltip: {
                                pointFormat: "Value: {point.y:.2f}"
                            },

                            series: [{
                                type: 'line',
                                name: '<?php echo $_POST['symbol'];?>',
                                data: myCCIArray
                            }],

                            responsive: {
                                rules: [{
                                    condition: {
                                        maxWidth: 500
                                    },
                                    chartOptions: {
                                        legend: {
                                            layout: 'horizontal',
                                            align: 'center',
                                            verticalAlign: 'bottom'
                                        }
                                    }
                                }]
                            }

                        });

                    } else if(technicalIndicator == 'BBANDS') {
                        priceDiv.style.display = 'none';
                        smaDiv.style.display = 'none';
                        emaDiv.style.display = 'none';
                        stochDiv.style.display = 'none';
                        rsiDiv.style.display = 'none';
                        adxDiv.style.display = 'none';
                        cciDiv.style.display = 'none';
                        bbandsDiv.style.display = 'block';
                        macdDiv.style.display = 'none';

                        var datesForBBANDS = data['Technical Analysis: BBANDS'];
                        var datesArrayBBANDS = [];
                        var realLowerBands = [];
                        var realUpperBands = [];
                        var realMiddleBands = [];
                        var datesFormattedBBANDS = [];
                        for(var k in datesForBBANDS) { 
                            datesArrayBBANDS.push(k);
                            realLowerBands.push(datesForBBANDS[k]['Real Lower Band']);
                            realUpperBands.push(datesForBBANDS[k]['Real Upper Band']);
                            realMiddleBands.push(datesForBBANDS[k]['Real Middle Band']);
                        }

                        console.log('datesArrayBBANDS', datesArrayBBANDS);
                        var myrealLowerBandsArray = realLowerBands.slice(0,120);
                        for(var i = 0; i < myrealLowerBandsArray.length; i++) { myrealLowerBandsArray[i] = parseFloat(myrealLowerBandsArray[i]);}

                        var myrealUpperBandsArray = realUpperBands.slice(0,120);
                        for(var i = 0; i < myrealUpperBandsArray.length; i++) { myrealUpperBandsArray[i] = parseFloat(myrealUpperBandsArray[i], 10);}

                        var myrealMiddleBandsArray = realMiddleBands.slice(0,120);
                        for(var i = 0; i < myrealMiddleBandsArray.length; i++) { myrealMiddleBandsArray[i] = parseFloat(myrealMiddleBandsArray[i], 10);}

                        var datesArrayBBANDS = datesArrayBBANDS.slice(0, 120);
                        for(var i = 0; i < datesArrayBBANDS.length; i++){
                            datesFormattedBBANDS.push(datesArrayBBANDS[i].replace(/-/g, '\/').substring(5, datesArrayBBANDS[i].length));
                        }


                        //Line Chart for BBANDS ##########################################################################################################
                        Highcharts.chart('bbandsContainer', {

                            chart: {
                                borderColor: 'gray',
                                borderWidth: 1,
                                type: 'line',
                            },

                            title: {
                                text: 'Bollinger Bands (BBANDS)'
                            },

                            subtitle: {
                                text: 'Source: <a href="https://www.alphavantage.co/"> Alpha Vantage</a>',
                                style: {
                                    color: "#0000ff"
                                }
                            },

                            colors: ['black', '#7EC0EE', '#cc0000'],

                            xAxis: [{
                                categories: datesFormattedBBANDS.reverse(),
                                crosshair: true,
                                tickInterval: 7,
                                labels: {
                                    rotation: -45
                                } 
                            }],

                            yAxis: {
                                title: {
                                    text: 'BBANDS'

                                }
                            },
                            legend: {
                                layout: 'vertical',
                                align: 'right',
                                verticalAlign: 'middle'
                            },

                            plotOptions: {
                                series: {
                                    marker: {
                                        enabled: true
                                    }
                                }
                            },
                            tooltip: {
                                pointFormat: "Value: {point.y:.2f}"
                            },
                            series: [{
                                type: 'line',
                                name: '<?php echo $_POST['symbol'].' Real Lower Bands';?>',
                                data: myrealLowerBandsArray
                            }, {
                                type: 'line',
                                name: '<?php echo $_POST['symbol'].' Real Upper Bands';?>',
                                data: myrealUpperBandsArray
                            }, {
                                type: 'line',
                                name: '<?php echo $_POST['symbol'].' Real Middle Bands';?>',
                                data: myrealMiddleBandsArray
                            }],

                            responsive: {
                                rules: [{
                                    condition: {
                                        maxWidth: 500
                                    },
                                    chartOptions: {
                                        legend: {
                                            layout: 'horizontal',
                                            align: 'center',
                                            verticalAlign: 'bottom'
                                        }
                                    }
                                }]
                            }

                        });


                    } else if(technicalIndicator == 'MACD') {
                        priceDiv.style.display = 'none';
                        smaDiv.style.display = 'none';
                        emaDiv.style.display = 'none';
                        stochDiv.style.display = 'none';
                        rsiDiv.style.display = 'none';
                        adxDiv.style.display = 'none';
                        cciDiv.style.display = 'none';
                        bbandsDiv.style.display = 'none';
                        macdDiv.style.display = 'block';

                        var datesForMACD = data['Technical Analysis: MACD'];
                        var datesArrayMACD = [];
                        var MACDArray = [];
                        var datesFormattedMACD = [];
                        for(var k in datesForMACD) { 
                            datesArrayMACD.push(k);
                            MACDArray.push(datesForMACD[k]['MACD']);
                        }

                        var myMACDArray = MACDArray.slice(0,120);
                        for(var i=0; i<myMACDArray.length; i++) { myMACDArray[i] = parseFloat(myMACDArray[i], 10);}

                        var datesArrayMACD = datesArrayMACD.slice(0, 120);
                        for(var i = 0; i < datesArrayMACD.length; i++){
                            datesFormattedMACD.push(datesArrayMACD[i].replace(/-/g, '\/').substring(5, datesArrayMACD[i].length));
                        }

                        //Line Chart for MACD ##########################################################################################################
                        Highcharts.chart('macdContainer', {

                            chart: {
                                borderColor: 'gray',
                                borderWidth: 1,
                                type: 'line',
                            },

                            title: {
                                text: 'Average Directional Movement Index (MACD)'
                            },

                            subtitle: {
                                text: 'Source: <a href="https://www.alphavantage.co/"> Alpha Vantage</a>',
                                style: {
                                    color: "#0000ff"
                                }
                            },

                            colors: ['red'],

                            xAxis: [{
                                categories: datesFormattedMACD.reverse(),
                                crosshair: true,
                                tickInterval: 7,
                                labels: {
                                    rotation: -45
                                } 
                            }],

                            yAxis: {
                                title: {
                                    text: 'MACD'

                                }
                            },
                            legend: {
                                layout: 'vertical',
                                align: 'right',
                                verticalAlign: 'middle'
                            },

                            plotOptions: {
                                series: {
                                    label: {
                                        connectorAllowed: false
                                    }
                                }
                            },

                            tooltip: {
                                pointFormat: "Value: {point.y:.2f}"
                            },

                            series: [{
                                type: 'line',
                                name: '<?php echo $_POST['symbol'];?>',
                                data: myMACDArray
                            }],

                            responsive: {
                                rules: [{
                                    condition: {
                                        maxWidth: 500
                                    },
                                    chartOptions: {
                                        legend: {
                                            layout: 'horizontal',
                                            align: 'center',
                                            verticalAlign: 'bottom'
                                        }
                                    }
                                }]
                            }

                        });

                    }

                });
            }
        </script>

        <!-- PHP Script -->
        <?php
        if(isset($_POST['submit'])){
            if (! function_exists('array_column')) {
                function array_column(array $input, $columnKey, $indexKey = null) {
                    $array = array();
                    foreach ($input as $value) {
                        if ( !array_key_exists($columnKey, $value)) {
                            trigger_error("Key \"$columnKey\" does not exist in array");
                            return false;
                        }
                        if (is_null($indexKey)) {
                            $array[] = $value[$columnKey];
                        }
                        else {
                            if ( !array_key_exists($indexKey, $value)) {
                                trigger_error("Key \"$indexKey\" does not exist in array");
                                return false;
                            }
                            if ( ! is_scalar($value[$indexKey])) {
                                trigger_error("Key \"$indexKey\" does not contain scalar value");
                                return false;
                            }
                            $array[$value[$indexKey]] = $value[$columnKey];
                        }
                    }
                    return $array;
                }
            }

            $urlToFetchPrice = array(
                'function' => 'TIME_SERIES_DAILY',
                'symbol' => $_POST['symbol'],
                'apikey' => '7VDD3ZWMAFBQZD4B',
                'outputsize' => 'full',
            );
            $url = 'https://www.alphavantage.co/query';
            $final = $url . "?" . http_build_query($urlToFetchPrice);

            $response = file_get_contents($final);
            $error = '/Invalid API call./';

            if(preg_match($error, $response)){
                echo '</br>';
                echo '</br>';
                echo '<div id = "errorContainer" style="display: block"><table class = "errorTable"><tbody>';
                echo '<tr><td>Error </td>';
                echo '<td>'; 
                echo 'Error: NO record has been found, please enter a valid symbol.';
                echo '</td></tr>';

            } else {
                $jsonData = stripslashes(html_entity_decode($response));
                $jsonData = json_decode($jsonData, true);
                reset($jsonData);

                $price = array_column($jsonData['Time Series (Daily)'], '4. close');
                $volume = array_column($jsonData['Time Series (Daily)'], '5. volume');

                echo '</br>';
                echo '<div id = "mainContainer" style="display: block">';
                echo '<div = "tableDiv"><table class = "resultTable"><tbody>';
                echo '<tr><td>Stock Ticker Symbol </td>';
                echo '<td>'; 
                print_r($jsonData ['Meta Data']['2. Symbol']); 
                echo '</td></tr>';

                echo '<tr><td>Close </td>';
                $close = $jsonData['Time Series (Daily)'][key($jsonData['Time Series (Daily)'])]['4. close'];
                echo '<td>'; 
                print_r($jsonData['Time Series (Daily)'][key($jsonData['Time Series (Daily)'])]['4. close']);
                echo '</td></tr>';

                echo '<tr><td>Open </td>';
                echo '<td>';
                print_r($jsonData['Time Series (Daily)'][key($jsonData['Time Series (Daily)'])]['1. open']);
                echo '</td></tr>';

                echo '<tr><td>Previous Close </td>';
                $prevClose = $jsonData['Time Series (Daily)'][array_keys($jsonData['Time Series (Daily)'])[1]]['4. close'];
                echo '<td>';
                print_r($jsonData['Time Series (Daily)'][array_keys($jsonData['Time Series (Daily)'])[1]]['4. close']);
                echo '</td></tr>';

                echo '<tr><td>Change </td>';
                echo '<td>';
                $change = round(($close - $prevClose), 2);
                echo $change; echo ' ';
                if($change > 0){
                    echo '<img src = "http://cs-server.usc.edu:45678/hw/hw6/images/Green_Arrow_Up.png" alt = "Up Arrow"/>';
                } else {
                    echo '<img src = "http://cs-server.usc.edu:45678/hw/hw6/images/Red_Arrow_Down.png" alt = "Down Arrow"/>';
                }
                echo '</td></tr>';

                echo '<tr><td>Change Percent </td>';
                echo '<td>';
                $changePercentage = round(((($close - $prevClose)/($close))*100), 2);
                echo $changePercentage." %"; echo ' ';
                if($changePercentage > 0){
                    echo '<img src = "http://cs-server.usc.edu:45678/hw/hw6/images/Green_Arrow_Up.png" alt = "Up Arrow"/>';
                } else {
                    echo '<img src = "http://cs-server.usc.edu:45678/hw/hw6/images/Red_Arrow_Down.png" alt = "Down Arrow"/>';
                }
                echo '</td></tr>';

                echo '<tr><td>Day Range </td>';
                echo '<td>';
                echo $jsonData['Time Series (Daily)'][key($jsonData['Time Series (Daily)'])]['3. low']." - ".$jsonData['Time Series (Daily)'][key($jsonData['Time Series (Daily)'])]['2. high'];
                echo '</td></tr>';

                echo '<tr><td>Volume </td>';
                echo '<td>';
                echo number_format($jsonData['Time Series (Daily)'][key($jsonData['Time Series (Daily)'])]['5. volume']);
                echo '</td></tr>';

                echo '<tr><td>Timestamp </td>';
                echo '<td>';
                date_default_timezone_set('America/Los_Angeles');
                $timestamp = date('Y-m-d', strtotime(array_keys($jsonData['Time Series (Daily)'])[0]));
                echo $timestamp;
                echo '</td></tr>';

                echo '<tr><td>Indicators </td>';
                echo '<td>';
                echo '<a id = "techIndicator" value = "Price" href="#Price" onclick = "createURL(this)">Price</a>'; echo "&nbsp;&nbsp;&nbsp;&nbsp;";
                echo '<a id = "techIndicator" value = "SMA" href="#SMA" onclick = "createURL(this)">SMA</a>'; echo "&nbsp;&nbsp;&nbsp;&nbsp;";
                echo '<a id = "techIndicator" value = "EMA" href="#EMA" onclick = "createURL(this)">EMA</a>'; echo "&nbsp;&nbsp;&nbsp;&nbsp;";
                echo '<a id = "techIndicator" value = "STOCH" href="#STOCH" onclick = "createURL(this)">STOCH</a>'; echo "&nbsp;&nbsp;&nbsp;&nbsp;";
                echo '<a id = "techIndicator" value = "RSI" href="#RSI" onclick = "createURL(this)">RSI</a>'; echo "&nbsp;&nbsp;&nbsp;&nbsp;";
                echo '<a id = "techIndicator" value = "ADX" href="#ADX" onclick = "createURL(this)">ADX</a>'; echo "&nbsp;&nbsp;&nbsp;&nbsp;";
                echo '<a id = "techIndicator" value = "CCI" href="#CCI" onclick = "createURL(this)">CCI</a>'; echo "&nbsp;&nbsp;&nbsp;&nbsp;";
                echo '<a id = "techIndicator" value = "BBANDS" href="#BBANDS" onclick = "createURL(this)">BBANDS</a>'; echo "&nbsp;&nbsp;&nbsp;&nbsp;";
                echo '<a id = "techIndicator" value = "MACD" href="#MACD" onclick = "createURL(this)">MACD</a>';
                echo '</td></tr>';

                echo '</tbody></table></div>';
                echo '</br>';
                echo '<div id="priceContainer" style="width: 1200px; height: 500px; display: block; margin: 0 auto"></div>';
                echo '<div id="smaContainer" style="width: 1200px; height: 500px; display: none; margin: 0 auto"></div>';
                echo '<div id="emaContainer" style="width: 1200px; height: 500px; display: none; margin: 0 auto"></div>';
                echo '<div id="stochContainer" style="width: 1200px; height: 500px; display: none; margin: 0 auto"></div>';
                echo '<div id="rsiContainer" style="width: 1200px; height: 500px; display: none; margin: 0 auto"></div>';
                echo '<div id="adxContainer" style="width: 1200px; height: 500px; display: none; margin: 0 auto"></div>';
                echo '<div id="cciContainer" style="width: 1200px; height: 500px; display: none; margin: 0 auto"></div>';
                echo '<div id="bbandsContainer" style="width: 1200px; height: 500px; display: none; margin: 0 auto"></div>';
                echo '<div id="macdContainer" style="width: 1200px; height: 500px; display: none; margin: 0 auto"></div>';
                echo '</br>';
                echo '<div id = "hideNews"><p id = "myText" style = "color: gray; font-family: serif; text-align: center;">Click to show stock news</p><img id = "myImage" style =  "margin-left: 50%; width: 35px; height: 10px;" src = "http://cs-server.usc.edu:45678/hw/hw6/images/Gray_Arrow_Down.png" alt = "Gray Arrow Down" onclick = "imageClicked()"/></div>';

                //URL for XML Part
                $urlForXML = 'https://seekingalpha.com/api/sa/combined/'.$_POST['symbol'].'.xml';

                $loadXML = simplexml_load_file($urlForXML);
                $jsonEncodeForXML = json_encode($loadXML);
                $decodedJsonFromXML = json_decode($jsonEncodeForXML, true);
                reset($decodedJsonFromXML);

                echo '</br>';
                echo '<div id = "newsTableDiv" style = "display: none"><table class = "newsTable"><tbody>';
                for($i = 0; $i<5; $i++) {
                    echo '<tr><td>';
                    echo "&nbsp";
                    echo '<a href="'.$decodedJsonFromXML['channel']['item'][$i]['link'].'">'.$decodedJsonFromXML['channel']['item'][$i]['title'].'</a>';
                    echo "&nbsp;&nbsp;&nbsp;&nbsp;";
                    $pubDate = $decodedJsonFromXML['channel']['item'][$i]['pubDate'];
                    echo 'Publicated Time: '.substr($pubDate, 0, (sizeof($pubDate)-6)).'</br>';
                    echo '</td></tr>';
                }
                echo '</tbody></table></div>';
                echo '</div>';
            }
        }

        ?>

        <!-- High Charts -->
        <script src="https://code.highcharts.com/highcharts.src.js"></script>
        <script src="https://code.highcharts.com/highcharts-more.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/stock/indicators/indicators.js"></script>
        <script>
            var price_data = [<?php foreach (array_slice($price, 0, 120) as $key => $val) { echo $val.','; } ?>];
            var max_price = 0;
            var min_price = price_data.length > 0 ? price_data[0] : 0;
            var volume_data  = [<?php foreach (array_slice($volume, 0, 120) as $key => $value) { echo $value.','; } ?>];
            var max_volume = 0;
            for(i =0; i< price_data.length; i++) {
                if(max_price < price_data[i])
                    max_price = price_data[i];
                if(min_price > price_data[i])
                    min_price = price_data[i];
            }
            for(i =0; i< volume_data.length; i++) {
                if(max_volume < volume_data[i])
                    max_volume = volume_data[i];
            }
            console.log(min_price*10, max_price, max_volume);

            Highcharts.chart('priceContainer', {
                chart: {
                    zoomType: 'xy',
                    borderColor: 'gray',
                    borderWidth: 1,
                    width: 1200,
                    marginRight: 200
                },
                title: {
                    text: 'Stock Price' + ' ' + '(' + new Date(Date.now()).toLocaleString().slice(0,10) + ')'
                },

                subtitle: {
                    text: 'Source: <a href="https://www.alphavantage.co/"> Alpha Vantage</a>',
                    style: {
                        color: "#0000ff"
                    }
                },

                xAxis: [{
                    categories: [<?php foreach(array_reverse(array_slice(array_keys($jsonData['Time Series (Daily)']), 0, 120)) as $key => $value) { $value = str_replace("-", "/", $value);
                                                                                                                                                    $value = substr($value, 5, 10); echo '"'.$value.'"'.','; } ?>],
                    crosshair: true,
                    tickInterval: 7,
                    labels: {
                        rotation: -45
                    } 
                }],
                yAxis: [{ // Primary yAxis
                    min: min_price,
                    max: max_price,
                    labels: {
                        format: '{value}$',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    },
                    title: {
                        text: 'Stock Price',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    }
                }, { // Secondary yAxis
                    max: max_volume * 5,
                    title: {
                        text: 'Volume',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    },
                    labels: {
                        pointFormat: "Value: {point.y:,.0f}",
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    },
                    opposite: true
                }],
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'top',
                    x: 0,
                    y: 200,
                    backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
                },
                plotOptions: {
                    series: {
                        marker: {
                            enabled: false
                        }
                    }
                },
                series: [{
                    name: '<?php echo $_POST['symbol']; ?>',
                    type: 'area',
                    color: '#FF0000',
                    fillOpacity: 0.5,
                    data: price_data.slice(0,120).reverse(),
                    tooltip: {
                        valueSuffix: '$'
                    }
                },
                         {
                             name: '<?php echo $_POST['symbol'].' Volume'; ?>',
                             type: 'column',
                             yAxis: 1,
                             color: 'white',
                             data: volume_data.slice(0,120).reverse(),

                         }]
            });


        </script>
    </body>
</html>