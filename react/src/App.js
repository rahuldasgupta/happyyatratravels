import React, { Component } from "react";
import { BrowserRouter as Router, Route, Switch } from "react-router-dom";
import booking from "./forms/booking";
import 'bootstrap/dist/css/bootstrap.min.css';

class App extends Component {
  render() {
    return (
      <Router>
        <Switch>
          <Route exact path="/" component={booking} />
        </Switch>
      </Router>
    );
  }
}

export default App;