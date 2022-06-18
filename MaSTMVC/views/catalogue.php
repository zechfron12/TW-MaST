<?php
/** @var $this View */
use app\core\View;
$this->title = 'Catalogue';

if(isset($_POST['submit'])){
    if(!empty($_POST['sort'])) {
        $sort = $_POST['sort'];
    }
}
if(isset($_POST['submit'])){
    if(!empty($_POST['country'])) {
        $country = $_POST['country'];
    }
    if(isset($_POST['submit'])){
        if(!empty($_POST['startYear'])) {
            $startYear = $_POST['startYear'];
        }
    }
    if(isset($_POST['submit'])){
        if(!empty($_POST['endYear'])) {
            $endYear = $_POST['endYear'];
        }
    }
    if(isset($_POST['submit'])){
        if(!empty($_POST['theme'])) {
            $theme = $_POST['theme'];
        }
    }
    if(isset($_POST['submit'])){
        if(!empty($_POST['color'])) {
            $color = $_POST['color'];
        }
    }
    if(isset($_POST['submit'])){
        if(!empty($_POST['currency'])) {
            $currency = $_POST['currency'];
        }
    }
}
?>

<div id="catalogue">
    <form action="" method="post">
    <div id="catalogueBar">
        <div class="search">
            <input type="text" placeholder="Search..." />
            <button type="submit">
                <i class="fa fa-search"></i>
            </button>
        </div>
        <div class="sortBy">
            <select name="sort">
                <option value="0">Sort by:</option>
                <option value="1">Popularity</option>
                <option value="2">Price ascending</option>
                <option value="3">Price descending</option>
                <option value="4">Country ascending</option>
                <option value="5">Country descending</option>
                <option value="6">Title ascending</option>
                <option value="7">Title descending</option>
            </select>
        </div>
        <div id="advancedSearch">Advanced</div>
    </div>
    <div id="advancedBar">
        <div id="countrySelect">
            <select name="country">
                <option value="0">Any country</option>
                <option value="1">Romania</option>
                <option value="2">Hungary</option>
                <option value="3">USA</option>
                <option value="4">UK</option>
                <option value="5">Germany</option>
                <option value="6">France</option>
            </select>
        </div>

        <div id="yearFromSelect">
            <select id="startYear" name="startYear">
                <option value="0">All years</option>
                <option value="1940">1940</option>
                <option value="1941">1941</option>
                <option value="1942">1942</option>
                <option value="1943">1943</option>
                <option value="1944">1944</option>
                <option value="1945">1945</option>
                <option value="1946">1946</option>
                <option value="1947">1947</option>
                <option value="1948">1948</option>
                <option value="1949">1949</option>
                <option value="1950">1950</option>
                <option value="1951">1951</option>
                <option value="1952">1952</option>
                <option value="1953">1953</option>
                <option value="1954">1954</option>
                <option value="1955">1955</option>
                <option value="1956">1956</option>
                <option value="1957">1957</option>
                <option value="1958">1958</option>
                <option value="1959">1959</option>
                <option value="1960">1960</option>
                <option value="1961">1961</option>
                <option value="1962">1962</option>
                <option value="1963">1963</option>
                <option value="1964">1964</option>
                <option value="1965">1965</option>
                <option value="1966">1966</option>
                <option value="1967">1967</option>
                <option value="1968">1968</option>
                <option value="1969">1969</option>
                <option value="1970">1970</option>
                <option value="1971">1971</option>
                <option value="1972">1972</option>
                <option value="1973">1973</option>
                <option value="1974">1974</option>
                <option value="1975">1975</option>
                <option value="1976">1976</option>
                <option value="1977">1977</option>
                <option value="1978">1978</option>
                <option value="1979">1979</option>
                <option value="1980">1980</option>
                <option value="1981">1981</option>
                <option value="1982">1982</option>
                <option value="1983">1983</option>
                <option value="1984">1984</option>
                <option value="1985">1985</option>
                <option value="1986">1986</option>
                <option value="1987">1987</option>
                <option value="1988">1988</option>
                <option value="1989">1989</option>
                <option value="1990">1990</option>
                <option value="1991">1991</option>
                <option value="1992">1992</option>
                <option value="1993">1993</option>
                <option value="1994">1994</option>
                <option value="1995">1995</option>
                <option value="1996">1996</option>
                <option value="1997">1997</option>
                <option value="1998">1998</option>
                <option value="1999">1999</option>
                <option value="2000">2000</option>
                <option value="2001">2001</option>
                <option value="2002">2002</option>
                <option value="2003">2003</option>
                <option value="2004">2004</option>
                <option value="2005">2005</option>
                <option value="2006">2006</option>
                <option value="2007">2007</option>
                <option value="2008">2008</option>
                <option value="2009">2009</option>
                <option value="2010">2010</option>
                <option value="2011">2011</option>
                <option value="2012">2012</option>
                <option value="2013">2013</option>
                <option value="2014">2014</option>
                <option value="2015">2015</option>
                <option value="2016">2016</option>
                <option value="2017">2017</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
            </select>
        </div>
        <div id="yearToSelect">
            <select id="endYear" name="endYear">
                <option value="0">All years</option>
                <option value="1940">1940</option>
                <option value="1941">1941</option>
                <option value="1942">1942</option>
                <option value="1943">1943</option>
                <option value="1944">1944</option>
                <option value="1945">1945</option>
                <option value="1946">1946</option>
                <option value="1947">1947</option>
                <option value="1948">1948</option>
                <option value="1949">1949</option>
                <option value="1950">1950</option>
                <option value="1951">1951</option>
                <option value="1952">1952</option>
                <option value="1953">1953</option>
                <option value="1954">1954</option>
                <option value="1955">1955</option>
                <option value="1956">1956</option>
                <option value="1957">1957</option>
                <option value="1958">1958</option>
                <option value="1959">1959</option>
                <option value="1960">1960</option>
                <option value="1961">1961</option>
                <option value="1962">1962</option>
                <option value="1963">1963</option>
                <option value="1964">1964</option>
                <option value="1965">1965</option>
                <option value="1966">1966</option>
                <option value="1967">1967</option>
                <option value="1968">1968</option>
                <option value="1969">1969</option>
                <option value="1970">1970</option>
                <option value="1971">1971</option>
                <option value="1972">1972</option>
                <option value="1973">1973</option>
                <option value="1974">1974</option>
                <option value="1975">1975</option>
                <option value="1976">1976</option>
                <option value="1977">1977</option>
                <option value="1978">1978</option>
                <option value="1979">1979</option>
                <option value="1980">1980</option>
                <option value="1981">1981</option>
                <option value="1982">1982</option>
                <option value="1983">1983</option>
                <option value="1984">1984</option>
                <option value="1985">1985</option>
                <option value="1986">1986</option>
                <option value="1987">1987</option>
                <option value="1988">1988</option>
                <option value="1989">1989</option>
                <option value="1990">1990</option>
                <option value="1991">1991</option>
                <option value="1992">1992</option>
                <option value="1993">1993</option>
                <option value="1994">1994</option>
                <option value="1995">1995</option>
                <option value="1996">1996</option>
                <option value="1997">1997</option>
                <option value="1998">1998</option>
                <option value="1999">1999</option>
                <option value="2000">2000</option>
                <option value="2001">2001</option>
                <option value="2002">2002</option>
                <option value="2003">2003</option>
                <option value="2004">2004</option>
                <option value="2005">2005</option>
                <option value="2006">2006</option>
                <option value="2007">2007</option>
                <option value="2008">2008</option>
                <option value="2009">2009</option>
                <option value="2010">2010</option>
                <option value="2011">2011</option>
                <option value="2012">2012</option>
                <option value="2013">2013</option>
                <option value="2014">2014</option>
                <option value="2015">2015</option>
                <option value="2016">2016</option>
                <option value="2017">2017</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
            </select>
        </div>

        <div id="themeSelect">
            <select name="theme">
                <option value="0">Any theme</option>
                <option value="1">Family</option>
                <option value="2">Agriculte</option>
                <option value="3">Architecture</option>
                <option value="4">Army</option>
                <option value="5">Aviation</option>
                <option value="6">Fishing</option>
            </select>
        </div>

        <div id="colorSelect">
            <select name="color">
                <option value="0">Any color</option>
                <option value="1">Red</option>
                <option value="2">Yellow</option>
                <option value="3">Blue</option>
                <option value="4">Green</option>
                <option value="5">Brown</option>
                <option value="6">Magenta</option>
            </select>
        </div>

        <div id="currencySelect">
            <select name="currency">
                <option value="0">Any currency</option>
                <option value="1">RON</option>
                <option value="2">USD</option>
                <option value="3">GBP</option>
                <option value="4">EUR</option>
                <option value="5">CHF</option>
                <option value="6">YPN</option>
            </select>
        </div>
    </div>
    </form>
    <div id="items-list-wrapper">
        <?php echo $resultingStamps ?>
        <div id="items-list">
            <div class="stamp-card card1">
                <div class="stamp-card-image">
                    <img src="../views/assets/stamp_image1.jpg" alt="" />
                </div>
                <div class="stamp-card-title">
                    1861 -1863 Hermes Head - Final Athens Print - No.
                    12-16: 7 mm Control Number on Back
                </div>
                <div class="stamp-card-price">0.40$</div>
                <div class="stamp-card-country">Romania</div>
            </div>
            <div class="stamp-card card2">
                <div class="stamp-card-image">
                    <img src="../views/assets/stamp_image1.jpg" alt="" />
                </div>
                <div class="stamp-card-title">
                    1861 -1863 Hermes Head - Final Athens Print - No.
                    12-16: 7 mm Control Number on Back
                </div>
                <div class="stamp-card-price">0.40$</div>
                <div class="stamp-card-country">Romania</div>
            </div>
            <div class="stamp-card card3">
                <div class="stamp-card-image">
                    <img src="../views/assets/stamp_image1.jpg" alt="" />
                </div>
                <div class="stamp-card-title">
                    1861 -1863 Hermes Head - Final Athens Print - No.
                    12-16: 7 mm Control Number on Back
                </div>
                <div class="stamp-card-price">0.40$</div>
                <div class="stamp-card-country">Romania</div>
            </div>
            <div class="stamp-card card4">
                <div class="stamp-card-image">
                    <img src="../views/assets/stamp_image1.jpg" alt="" />
                </div>
                <div class="stamp-card-title">
                    1861 -1863 Hermes Head - Final Athens Print - No.
                    12-16: 7 mm Control Number on Back
                </div>
                <div class="stamp-card-price">0.40$</div>
                <div class="stamp-card-country">Romania</div>
            </div>
            <div class="stamp-card card5">
                <div class="stamp-card-image">
                    <img src="../views/assets/stamp_image1.jpg" alt="" />
                </div>
                <div class="stamp-card-title">
                    1861 -1863 Hermes Head - Final Athens Print - No.
                    12-16: 7 mm Control Number on Back
                </div>
                <div class="stamp-card-price">0.40$</div>
                <div class="stamp-card-country">Romania</div>
            </div>
            <div class="stamp-card card6">
                <div class="stamp-card-image">
                    <img src="../views/assets/stamp_image1.jpg" alt="" />
                </div>
                <div class="stamp-card-title">
                    1861 -1863 Hermes Head - Final Athens Print - No.
                    12-16: 7 mm Control Number on Back
                </div>
                <div class="stamp-card-price">0.40$</div>
                <div class="stamp-card-country">Romania</div>
            </div>
            <div class="stamp-card card7">
                <div class="stamp-card-image">
                    <img src="../views/assets/stamp_image1.jpg" alt="" />
                </div>
                <div class="stamp-card-title">
                    1861 -1863 Hermes Head - Final Athens Print - No.
                    12-16: 7 mm Control Number on Back
                </div>
                <div class="stamp-card-price">0.40$</div>
                <div class="stamp-card-country">Romania</div>
            </div>
            <div class="stamp-card card8">
                <div class="stamp-card-image">
                    <img src="../views/assets/stamp_image1.jpg" alt="" />
                </div>
                <div class="stamp-card-title">
                    1861 -1863 Hermes Head - Final Athens Print - No.
                    12-16: 7 mm Control Number on Back
                </div>
                <div class="stamp-card-price">0.40$</div>
                <div class="stamp-card-country">Romania</div>
            </div>
            <div class="stamp-card card9">
                <div class="stamp-card-image">
                    <img src="../views/assets/stamp_image1.jpg" alt="" />
                </div>
                <div class="stamp-card-title">
                    1861 -1863 Hermes Head - Final Athens Print - No.
                    12-16: 7 mm Control Number on Back
                </div>
                <div class="stamp-card-price">0.40$</div>
                <div class="stamp-card-country">Romania</div>
            </div>
            <div class="stamp-card card10">
                <div class="stamp-card-image">
                    <img src="../views/assets/stamp_image1.jpg" alt="" />
                </div>
                <div class="stamp-card-title">
                    1861 -1863 Hermes Head - Final Athens Print - No.
                    12-16: 7 mm Control Number on Back
                </div>
                <div class="stamp-card-price">0.40$</div>
                <div class="stamp-card-country">Romania</div>
            </div>
        </div>
        <div class="pagination">
            <ul>
                <!--pages or li are comes from javascript -->
            </ul>
        </div>
    </div>
</div>
