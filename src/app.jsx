import React from "react";
import Logo from "./components/logo";
import Heading from "./components/homepage/Heading";
import Login from "./components/homepage/login";
import Form from "./components/homepage/cardabc";
import Example from "./components/homepage/login"
import Dropdownbtn from "./components/homepage/dropdownbutton";
// import Sidebar from "./components/stdhome/sidebar";
// var choosecategory="admin";
function App()
{
    return (<div className="anu"><Logo /> <h1 className="head">Samadhan</h1><Login className="log"/>
    <Heading />
    {/* <Sidebar />  */}
    </div>
    )
}
export default App;