import React from "react";
import { withRouter, Link } from "react-router-dom";
import Select from "react-select";
import Row from "react-bootstrap/Row";
import Col from "react-bootstrap/Col";
import { ToastContainer, toast } from "react-toastify";
import Calendar from 'react-calendar';
import Modal from "react-bootstrap/Modal";
import ModalBody from "react-bootstrap/ModalBody";
import moment from 'moment';
import { IoClose, IoChevronBack, IoChevronForward } from "react-icons/io5";
import { RxDoubleArrowLeft, RxDoubleArrowRight, } from "react-icons/rx";
import axios from "axios";
import {initializeApp} from 'firebase/app';
import { getFirestore, collection, addDoc  } from "firebase/firestore";


import suv from "../assets/suv.png";
import sedan from "../assets/sedan.png";
import hatchback from "../assets/hatchback.png";
import van from "../assets/van.png";
import bike from "../assets/bike.png";

import suv_white from "../assets/suv_white.png";
import sedan_white from "../assets/sedan_white.png";
import hatchback_white from "../assets/hatchback_white.png";
import van_white from "../assets/van_white.png";
import bike_white from "../assets/bike_white.png";
import "./forms.css";
import "react-toastify/dist/ReactToastify.css";
import 'react-calendar/dist/Calendar.css';


const firebaseConfig = {
  apiKey: "AIzaSyBfwh7elwhd0jAdU04CKxugCFf7dsZXleY",
  authDomain: "happy-yatra-travel.firebaseapp.com",
  projectId: "happy-yatra-travel",
  storageBucket: "happy-yatra-travel.appspot.com",
  messagingSenderId: "83298667821",
  appId: "1:83298667821:web:8ecdc8dc73784337d157a4"
};

const packageOptions = [
  { value: "Cherrapunji Tours", label: "Cherrapunji Tours" },
  { value: "Tawang Valley Tours", label: "Tawang Valley Tours" },
  { value: "Dawki Tour & Camping", label: "Dawki Tour & Camping" },
  { value: "Shillong Tours", label: "Shillong Tours" },
  { value: "Guwahati City Tours", label: "Guwahati City Tours" },
  { value: "Kaziranga Safari Tours", label: "Kaziranga Safari Tours" },
  { value: "Custom Package", label: "Custom Package" }
];

const today = new Date();

class booking extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      switchView: true,
      fullName: "",
      phone: "",
      email: "",
      tourPackage: "",
      basicsChecked: false,
      calenderModal: false,
      bookingDate: "",
      unformattedDate: new Date(),
      vehicleType: "Hatchback",
      errors: {},
      count: 0,
    };
    this.handleFullName = this.handleFullName.bind(this);
    this.handlePhone = this.handlePhone.bind(this);
    this.handleEmail = this.handleEmail.bind(this);
  }
  handleFullName = async (event) => {
    let errors = this.state.errors;
    let fullName = event.target.value.length
    if (fullName>1) {
      errors["fullName"] = null
      this.setState({ errors: errors});
    }
     else {
      errors["fullName"] = "Enter a valid name";
      this.setState({ errors: errors});
    }
    this.setState({
        fullName: event.target.value,
    });
  }
  handlePhone = async (object) => {
    if (object.target.value.length <= object.target.maxLength) {
      this.setState({ phone: object.target.value });
    }
    let errors = this.state.errors;
    var phoneLength = object.target.value.length;
    if (phoneLength === 11 || phoneLength === 10 ) {
      errors["phone"] = null
      this.setState({ errors: errors});
    }
     else {
      errors["phone"] = "Must be 10 digits";
      this.setState({ errors: errors});
    }
  }
  handleEmail(event) {
    var re = /\S+@\S+\.\S+/;
    var result = re.test(event.target.value);
    let errors = this.state.errors;
    if(re.test(event.target.value))
    {
      errors["email"] = null
      this.setState({ errors: errors});
      console.log(result)
    }
    else{
      errors["email"] = "Invalid Email";
      this.setState({ errors: errors });
    }
    this.setState({
      email: event.target.value,
    });
  }
  handleTourPackage = (tourPackage) => {
    this.setState({ tourPackage: tourPackage.value });
    let errors = this.state.errors;
    if (this.state.tourPackage != null || tourPackage.value) {
      errors["tourPackage"] = null
      this.setState({ errors: errors });
    } else {
      errors["tourPackage"] = "Select a tour package";
      this.setState({ errors: errors });
    }
  };
  checkSubmit = () => {
    const {fullName, phone, email, tourPackage, bookingDate} = this.state;
    let nameWarning = this.state.errors["fullName"];
    let phoneWarning = this.state.errors["phone"];
    let emailWarning = this.state.errors["email"];
    if(fullName != "" && phone != "" && email != "" && tourPackage != "" && bookingDate != ""){
      if(emailWarning == null && nameWarning == null && phoneWarning == null)
      {
        toast.info('Sending..', {
          position: "bottom-center",
          autoClose: 5000,
          hideProgressBar: false,
          closeOnClick: true,
          pauseOnHover: true,
          draggable: true,
          progress: undefined,
          theme: "colored",
        });
        this.submitData()
      }
      
    }
    else{
      toast.warn('Form Incomplete', {
        position: "bottom-center",
        autoClose: 3000,
        hideProgressBar: false,
        closeOnClick: true,
        pauseOnHover: true,
        draggable: true,
        progress: undefined,
        theme: "colored",
      });
    }
  }
  submitData = async() => {
    const app = initializeApp(firebaseConfig);
    const db = getFirestore(app);
    const {fullName, phone, email, tourPackage, bookingDate, vehicleType} = this.state;
    try {
        if(this.state.count === 0){
            const bookings = await addDoc(collection(db, "bookings"), {
              fullName: fullName,
              phone: phone,
              email: email,
              tourPackage: tourPackage,
              bookingDate: bookingDate,
              vehicleType: vehicleType,
            });
            this.setState({count: 1})
            this.sendAdminEmail(bookings.id)
        }
    } catch (e) {
        console.error("Error adding document: ", e);
    }
  }
  changeDate = (dateStr) => {
    let errors = this.state.errors;
    if (dateStr != null && dateStr != "" && dateStr != undefined) {
      errors["bookingDate"] = null
      this.setState({ errors: errors});
    }
     else {
      errors["bookingDate"] = "Must not be empty";
      this.setState({ errors: errors});
    }
    let formattedDate = moment(dateStr, 'ddd MMM DD YYYY HH:mm:ss ZZ').format('Do MMMM, YYYY');
    this.setState({
      unformattedDate: dateStr,
      bookingDate: formattedDate,
      calenderModal: false
    })
  }
  sendAdminEmail = async(orderID) => {
    const {fullName, phone, email, tourPackage, bookingDate, vehicleType} = this.state;
    let postData = {
      email: email,
      fullName: fullName,
      phone: phone,
      tourPackage: tourPackage,
      bookingDate: bookingDate,
      vehicleType: vehicleType,
      bookingID: orderID,
    };
    await axios.post('https://happyyatratravels.com/api/bookings.php', postData)
      .then(response => {
        console.log('Bookings API: ', response.data.Status);
        toast.success('Form Submitted', {
          position: "bottom-center",
          autoClose: 3000,
          hideProgressBar: false,
          closeOnClick: true,
          pauseOnHover: true,
          draggable: true,
          progress: undefined,
          theme: "colored",
          style: { background: '#14bf98' },
        });
        this.sendUserEmail(orderID)
      })
      .catch(error => {
        console.error('Error:', error);
      });
  }
  sendUserEmail = async(orderID) => {
    const {fullName, phone, email, tourPackage, bookingDate, vehicleType} = this.state;
    let postData = {
      email: email,
      fullName: fullName,
      phone: phone,
      tourPackage: tourPackage,
      bookingDate: bookingDate,
      vehicleType: vehicleType,
      bookingID: orderID,
    };
    await axios.post('https://happyyatratravels.com/api/send_mail.php', postData)
      .then(response => {
        console.log('Send Mail API: ', response.data.Status);
        toast.success('Form Submitted', {
          position: "bottom-center",
          autoClose: 3000,
          hideProgressBar: false,
          closeOnClick: true,
          pauseOnHover: true,
          draggable: true,
          progress: undefined,
          theme: "colored",
          style: { background: '#14bf98' },
        });
        this.setState({
          fullName: "",
          phone: "",
          email: "",
          tourPackage: "",
          bookingDate: "",
          unformattedDate: new Date(),
          vehicleType: "Hatchback",
          errors: {},
        })
      })
      .catch(error => {
        console.error('Error:', error);
      });
  }
  render() {
    const { vehicleType, tourPackage } = this.state;
    let customStyles = {
      control: (provided, state) => ({
        ...provided,
        height: 48,
        borderRadius: 8,
        paddingLeft: 5,
        width: "100%",
        border: state.isFocused ? '1.6px solid #14bf98' : '1.4px solid #bfbfbf', // Border style for focused and non-focused state
        boxShadow: 'none', // Remove the box shadow
        '&:hover': {
          borderColor: '#14bf98', // Border color on hover
        }
      }),
      menu: (provided, state) => ({
        ...provided,
        backgroundColor: this.state.tourPackage == "Cherrapunji Tours" || this.state.tourPackage == "Custom Package" ? '#14bf98' : "#fff",
        
      }),
      option: (provided, state) => ({
        ...provided,
        backgroundColor: state.isSelected ? '#14bf98' : 'white', // Set the background color of selected and non-selected options
        color: state.isSelected ? 'white' : 'black', // Set the text color of selected and non-selected options
      }),
    };
    return (
      <div>
        <Modal
            show={this.state.calenderModal}
            keyboard={false}
            centered
            backdrop={false}
            size="md"
          >
          <ModalBody>
            <div>
              <IoClose
                size={25}
                className="closeIcon"
                onClick={() => this.setState({ calenderModal: false })}
              />
              <p className="modal_header_text">Select Booking Date</p>
              <br/>
              <center>
                <Calendar
                  className="calenderLayout"
                  prevLabel={(<IoChevronBack size={20}/>)}
                  prev2Label={(<RxDoubleArrowLeft size={22}/>)}
                  next2Label={(<RxDoubleArrowRight size={22}/>)}
                  nextLabel={(<IoChevronForward size={20}/>)}
                  onChange={(e)=>this.changeDate(e)}
                  value={this.state.unformattedDate}
                  minDate={today}
                />
              </center>
              {  
                this.state.errors["bookingDate"] ? (
                    <span
                        id="marginInputs"
                        className="validateErrorTxt"
                    >
                        {this.state.errors["bookingDate"]}
                    </span>
                ) :
                <></>
              }
            </div>
          </ModalBody>
        </Modal>
        <div>
          <div className="form_mainDiv">
            <p className="home_box_1_title_white">Book Your Trip</p>
            <p className="home_box_1_para_white">Fill up the form & our team will contact you shortly for confirmation.</p>
            <div>
              <Row>
                <Col md={12} xs={12} sm={12}>
                  <p className="inputHeaderTxt">Full Name *</p>
                  <input
                      className="createOrderInputFull"
                      type="text"
                      placeholder="Enter your full name"
                      onFocus={(e) => {this.handleFullName(e)}}
                      onChange={(e) => {this.handleFullName(e)}}
                      value={this.state.fullName}
                  />
                  {
                    this.state.errors["fullName"] ?
                      <span
                        className="validateErrorTxt"
                      >
                        {this.state.errors["fullName"]}
                      </span>
                      :
                      <></>
                  }
                </Col>
              </Row>
              <Row>
                <Col md={6} sm={12} xs={12}>
                  <p className="inputHeaderTxt">Phone Number *</p>
                  <input
                      className="createOrderInputFull"
                      type = "number" maxLength = "10"
                      placeholder="Enter your phone number"
                      value={this.state.phone}
                      onChange={this.handlePhone}
                      onFocus={this.handlePhone}
                      
                  />
                  {
                    this.state.errors["phone"] ?
                      <span
                        className="validateErrorTxt"
                      >
                        {this.state.errors["phone"]}
                      </span>
                      :
                      <></>
                  }
                </Col>
                <Col md={6} xs={12} sm={12}>
                  <p className="inputHeaderTxt">Email ID *</p>
                  <input
                      className="createOrderInputFull"
                      type="text"
                      value={this.state.email}
                      placeholder="Enter your email ID"
                      onChange={this.handleEmail}
                      onFocus={this.handleEmail}
                  />
                  {
                    this.state.errors["email"] ?
                      <span
                        className="validateErrorTxt"
                      >
                        {this.state.errors["email"]}
                      </span>
                      :
                      <></>
                  }
                </Col>
                <Col md={6} sm={12} xs={12}>
                  <p className="inputHeaderTxt">Tour Packages *</p>
                  <Select
                    onFocus={this.handleTourPackage}
                    onChange={this.handleTourPackage}
                    value={packageOptions.find((item) => item.value === tourPackage)}
                    options={packageOptions}
                    styles={customStyles}
                    placeholder={<div>Select package</div>}
                  />
                  {
                    this.state.errors["district"] ?
                      <span
                        className="validateErrorTxt"
                      >
                        {this.state.errors["district"]}
                      </span>
                      :
                      <></>
                  }
                </Col>
                <Col md={6} sm={12} xs={12}>
                  <p className="inputHeaderTxt">Booking Date *</p>
                  <div className="calender_div" onClick={() => this.setState({calenderModal: true})}>
                    {
                      this.state.bookingDate ? 
                      <p className="dob_txt">{this.state.bookingDate}</p>
                      :
                      <p className="dob_txt">Select booking date</p>
                    }
                  </div>
                </Col>
              </Row>
              <div className="checkboxes_main">
                <Row>
                  <Col md={1}></Col>
                  <Col md={2} xs={6} sm={6}>
                    <center>
                      <div className={vehicleType == "Hatchback" ? "checkboxes_active" : "checkboxes"} onClick={() => this.setState({vehicleType:"Hatchback"})}>
                        <img src={vehicleType == "Hatchback" ? hatchback_white : hatchback} className="hatchbackIcons"/>
                        <p className={vehicleType == "Hatchback" ? "cardTxtTitle_white" : "cardTxtTitle"}>4-Seater</p>
                      </div>
                    </center>
                  </Col>
                  <Col md={2} xs={6} sm={6}>
                    <center>
                      <div className={vehicleType == "SUV" ? "checkboxes_active" : "checkboxes"} onClick={() => this.setState({vehicleType:"SUV"})}>
                        <img src={vehicleType == "SUV" ? suv_white : suv} className="carIcons"/>
                        <p className={vehicleType == "SUV" ? "cardTxtTitle_white" : "cardTxtTitle"}>7-Seater SUV</p>
                      </div>
                    </center>
                  </Col>
                  <Col md={2} xs={6} sm={6}>
                    <center>
                      <div className={vehicleType == "Sedan" ? "checkboxes_active" : "checkboxes"} onClick={() => this.setState({vehicleType:"Sedan"})}>
                        <img src={vehicleType == "Sedan" ? sedan_white : sedan} className="carIcons"/>
                        <p className={vehicleType == "Sedan" ? "cardTxtTitle_white" : "cardTxtTitle"}>Sedan</p>
                      </div>
                    </center>
                  </Col>
                  <Col md={2} xs={6} sm={6}>
                    <center>
                      <div className={vehicleType == "Van" ? "checkboxes_active" : "checkboxes"} onClick={() => this.setState({vehicleType:"Van"})}>
                        <img src={vehicleType == "Van" ? van_white : van} className="hatchbackIcons"/>
                        <p className={vehicleType == "Van" ? "cardTxtTitle_white" : "cardTxtTitle"}>Mini Bus / Van</p>
                      </div>
                    </center>
                  </Col>
                  <Col md={2} xs={6} sm={6}>
                    <center>
                      <div className={vehicleType == "Bike" ? "checkboxes_active" : "checkboxes"} onClick={() => this.setState({vehicleType:"Bike"})}>
                        <img src={vehicleType == "Bike" ? bike_white : bike} className="hatchbackIcons"/>
                        <p className={vehicleType == "Bike" ? "cardTxtTitle_white" : "cardTxtTitle"}>Bike / Scooty</p>
                      </div>
                    </center>
                  </Col>
                </Row>
              </div>
              
              <center>
                <button className="submitData" onClick={this.checkSubmit}>
                    SUBMIT
                </button>
              </center>
            </div>
          </div>
        </div>
        <ToastContainer
          position="bottom-center"
          autoClose={3000}
          hideProgressBar={false}
          newestOnTop={false}
          closeOnClick
          rtl={false}
          pauseOnFocusLoss
          draggable
          pauseOnHover
          theme="light"
        />
      </div>
    )
  }
}
export default withRouter(booking);
