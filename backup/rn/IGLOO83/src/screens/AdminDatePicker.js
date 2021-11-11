import React, { Component } from 'react'
import DatePicker from 'react-native-datepicker'
import { View, Button, Text } from 'react-native';

class AdminDatePicker extends Component {
    static navigationOptions = {
        header: null
    }
    constructor(props) {
    super(props)
    var month = new Date().getMonth() + 1;
    this.state = {date: new Date().getFullYear()+"-"+month+"-"+new Date().getDate()}
    // console.log(this.state)
    }

    listShow() {
        this.props.navigation.navigate('AdminTicket', {
            requestDate: this.state.date,
        })
        // console.log("Test+")
        // console.log(this.state.date)
    }

    render(){
        console.disableYellowBox = true;
        return (
            <View style={{ flex: 1, justifyContent: 'center' }}>
                <Text style={{ fontSize: 25, textAlign: 'center' }}>Date wise Ticket Form</Text>
                <DatePicker
                    style={{width: 300, marginLeft: 40}}
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
                <View style={{margin:10}}>
                    <Button title={"Show Ticket"} onPress={_ => this.listShow() } />
                </View>
                <View style={{margin:10}}>
                    <Button color="#841584" style={{ marginTop: 10 }} title={"Log Out"} onPress={() => this.props.navigation.navigate('Home')} />
                </View>
            </View>
        )
    }
}

export default AdminDatePicker