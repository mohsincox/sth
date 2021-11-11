import React, { Component } from 'react';
import { View, Text, Button, FlatList, StyleSheet, Picker, ScrollView } from 'react-native';

class UserEdit extends Component {

    constructor(props) {
        super(props);
        this.state = {
            ticket: null,
            ticketId: null,
            remarks: null
        };
    }

    componentDidMount() {
        this.timer = setInterval(() => this.getAlertWeb(), 1000);
    }

    async getAlertWeb() {

        // return fetch(`http://192.168.100.83/iglooapp/user-edit/ticket/${this.props.navigation.state.params.JSON_ListView_Clicked_Item}`)
        return fetch(`http://202.51.177.67:8034/iglooapp/user-edit/ticket/${this.props.navigation.state.params.JSON_ListView_Clicked_Item}`)
            .then(response => response.json())
            .then(responseJson => {     
                this.setState({
                    ticket: responseJson.ticket,
                    dataSource: responseJson.deliveryStatuses,
                    ticketDetails: responseJson.ticketDetails,
                }, function() {
                    //comment
                });
            })
            .catch(error => {
                null;
            });
    }

    userRemarks(ticketId) {
        
        // fetch('http://192.168.100.83/iglooapp/user-remarks', {
        fetch('http://202.51.177.67:8034/iglooapp/user-remarks', {
            method: 'POST',
            headers: {
                Accept: 'application/json',
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                "ticketId": ticketId,
                "remarks": this.state.remarks,
            }),
        })
        .then((response) => response.json())
        .then((responseData) => {
            "POST Response",
            "Response Body -> " + JSON.stringify(responseData)
        })
        .done();

        // no keyboard
        // Keyboard.dismiss();
        // this.textInput.clear()

        // this.props.navigation.navigate('UserEdit');
        this.props.navigation.navigate('UserDatePicker');
    }

    render() {
        return (
            <ScrollView>
                <View> 
                    <FlatList
                        data = {this.state.ticket}
                        renderItem={({item}) => 
                            <View>
                                <Text style={styles.item}>{item.id}. Sub: {item.subject}</Text>
                                <Text>Name: {item.customer_name}</Text>
                                <Text>Mobile: {item.phone_number}</Text>
                                <Text>Address: {item.customer_address}</Text>
                                <Text>A. Assigned: {item.area_assigned}</Text>
                                <Text>Product: {item.product_model}</Text>
                                <Text>Price: {item.product_price}</Text>

                                {/* <Picker selectedValue={this.state.userId} onValueChange={(itemValue, itemIndex) => this.setState({userId: itemValue})} >
                                    <Picker.Item label='Please select an option...' value='' />
                                    { this.state.dataSource.map((item, key)=>(
                                        <Picker.Item label={item.detail} value={item.id} key={key} />
                                        )
                                    )}
                                </Picker> */}
                                <Picker
                                    selectedValue={this.state.remarks}

                                    onValueChange={(itemValue, itemIndex) => this.setState({remarks: itemValue})} >
                                    <Picker.Item label='Please select an option...' value='' />
                                    { this.state.dataSource.map((item, key)=>(
                                        <Picker.Item label={item.name} value={item.name} key={key} />)
                                    )}
                                </Picker>
                                <View style={{margin:10}}>
                                    <Button title={"Submit"} onPress={_ => this.userRemarks(item.id) }/>
                                </View>
                            </View>
                        } keyExtractor={(item, index) => index.toString()}
                    />

                    <FlatList style={{ marginTop: 10 }}
                        data = {this.state.ticketDetails}
                        renderItem={({item}) => 
                            <View >
                                <Text>{item.created_at}: {item.remarks}</Text>
                            </View>   
                        } keyExtractor={(item, index) => index.toString()}
                    />
                </View>
            </ScrollView>
        )
    }
};

export default UserEdit;

const styles = StyleSheet.create({
    container: {
        flex: 1,
        paddingTop: 22
    },
    item: {
        padding: 10,
        fontSize: 18,
        height: 44,
    },
})