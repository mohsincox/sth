import React, { Component } from 'react'
import DatePicker from 'react-native-datepicker'
import { View, Button, TextInput } from 'react-native';

export default class AdminDatePicker extends Component {
  constructor(props){
    super(props)
    var month = new Date().getMonth() + 1;
    this.state = {date: new Date().getFullYear()+"-"+month+"-"+new Date().getDate()}
    // console.log(this.state)
    
  }

  checkTest() {
    this.props.navigation.navigate('adminTicket', {
        requestDate: this.state.date,
        otherParam: 'anything you want here',
      }
      )
    // console.log("Test+")
    // console.log(this.state.date)
}

  render(){
    return (
        <View style={{ flex: 1, justifyContent: 'center' }}>
            <DatePicker
                style={{width: 200, marginBottom: 20, marginLeft: 20}}
                date={this.state.date}
                mode="date"
                placeholder="select date"
                format="YYYY-MM-DD"
                // minDate="2016-05-01"
                // maxDate="2016-06-01"
                confirmBtnText="Confirm"
                cancelBtnText="Cancel"
                customStyles={{
                dateIcon: {
                    position: 'absolute',
                    left: 0,
                    top: 4,
                    marginLeft: 0
                },
                dateInput: {
                    marginLeft: 36
                }
                // ... You can check the source to find the other keys.
                }}
                onDateChange={(date) => {this.setState({date: date})}}
                
            />
                <Button title={"Show Ticket"} onPress={_ => this.checkTest(   ) }/>
        </View>
    )
  }
}