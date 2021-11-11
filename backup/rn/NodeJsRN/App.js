/**
 * Sample React Native App
 * https://github.com/facebook/react-native
 *
 * @format
 * @flow
 * @lint-ignore-every XPLATJSCOPYRIGHT1
 */

import React, {Component} from 'react';
import {StyleSheet, Text, View, TextInput, TouchableHighlight, ScrollView} from 'react-native';


export default class App extends Component {
    constructor(props) {
        super(props)
        this.state = {
            apiData: [],
            naData: []
        }
        this.dataId = null;
        this.name = null;
        this.email = null;
        this.phone_number = null;
    }

    getButton = () => {
        fetch('http://192.168.100.83:9090/users', {
            method: 'GET'
        }).then((responseData) => {
            return responseData.json();
        }).then((jsonData) => {
            console.log(jsonData);
            this.setState({apiData: jsonData})
            console.log(this.state.apiData)
        }).done();
        this.dataId = null;
    }

    saveButton = () => {
        fetch('http://192.168.100.83:9090/user', {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({name: this.name, email: this.email, phone_number: this.phone_number})
        }).then((responseData) => {
            return responseData.json();
        }).then((jsonData) => {
            console.log(jsonData);
            this.setState({naData: jsonData})
            console.log(this.state.naData)
        }).done();
        this.dataId = null;
        this.name = null;
        this.email = null;
        this.phone_number = null;
    }

    searchButton = () => {
        fetch('http://192.168.100.83:9090/user/'+(this.dataId), {
            method: 'GET'
        }).then((responseData) => {
            return responseData.json();
        }).then((jsonData) => {
            console.log(jsonData);
            this.setState({apiData: jsonData})
            //console.log(this.state.apiData)
        }).done();
        this.dataId = null;
    }

    deleteButton = () => {
        fetch('http://192.168.100.83:9090/user/'+(this.dataId), {
            method: 'DELETE'
        }).then((responseData) => {
            console.log(responseData.rows)
        }).done();
        this.dataId = null;
    }

    updateButton = () => {
        fetch('http://192.168.100.83:9090/user', {
            method: 'PUT',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({name: this.name, email: this.email, phone_number: this.phone_number, id: this.dataId})
        }).then((responseData) => {
            return responseData.json();
        }).done();
        this.dataId = null;
        this.name = null;
        this.email = null;
        this.phone_number = null;
    }

    render() {
        const data = this.state.apiData;
        let dataDisplay = data.map(function(jsonData){
            return (
                <View key={jsonData.id}>
                    <View style={{flexDirection: "row"}}>
                        <Text style={{color: '#000'}}>{jsonData.id} | </Text>
                        <Text style={{color: '#000'}}>{jsonData.name} | </Text>
                        <Text style={{color: '#000'}}>{jsonData.email} | </Text>
                        <Text style={{color: '#000'}}>{jsonData.phone_number} | </Text>
                    </View>
                </View>
            );
        });

        return (
            <View style={styles.container}>
                <Text style={{ fontSize: 20, textAlign: 'center', marginTop: 10 }}>App Users</Text>
                <View style={{ height:2, backgroundColor: '#CCCCCC', marginBottom: 10, width: '90%' }}></View>
                <TextInput style={styles.input}
                    placeholder = 'Id'
                    onChangeText = {(text) => {this.dataId = text}}
                    value = {this.dataId}
                    underlineColorAndroid = 'transparent'
                />
                <TextInput style={styles.input}
                    placeholder = 'Enter Name'
                    onChangeText = {(text) => {this.name = text}}
                    value = {this.name}
                    underlineColorAndroid = 'transparent'
                />
                <TextInput style={styles.input}
                    placeholder = 'Enter Email'
                    onChangeText = {(text) => {this.email = text}}
                    value = {this.email}
                    underlineColorAndroid = 'transparent'
                />
                <TextInput style={styles.input}
                    placeholder = 'Enter Phone Number'
                    onChangeText = {(text) => {this.phone_number = text}}
                    value = {this.phone_number}
                    underlineColorAndroid = 'transparent'
                />
                <TouchableHighlight style = {styles.button} onPress = {this.getButton}>
                    <Text style = {styles.textStyle}>View Data</Text>
                </TouchableHighlight>
                <TouchableHighlight style = {styles.button} onPress = {this.searchButton}>
                    <Text style = {styles.textStyle}>Search</Text>
                </TouchableHighlight>
                <TouchableHighlight style = {styles.button} onPress = {this.saveButton}>
                    <Text style = {styles.textStyle}>Save</Text>
                </TouchableHighlight>
                <TouchableHighlight style = {styles.button} onPress = {this.deleteButton}>
                    <Text style = {styles.textStyle}>Delete</Text>
                </TouchableHighlight>
                <TouchableHighlight style = {styles.button} onPress = {this.updateButton}>
                    <Text style = {styles.textStyle}>Update</Text>
                </TouchableHighlight>
                <ScrollView>
                    {dataDisplay}
                </ScrollView>
            </View>
        );
    }
}

var styles = StyleSheet.create({
    container: {
        marginTop: 5,
        flex: 1,
        alignItems: 'center',
        backgroundColor: '#fff'
    },
    input: {
        textAlign: 'center',
        height: 30,
        width: '90%',
        padding: 4,
        marginBottom: 7,
        fontSize: 14,
        borderWidth:1,
        borderColor: '#48af',
        borderRadius: 5
    },
    button: {
        paddingTop: 10,
        paddingBottom: 5,
        borderRadius: 5,
        marginBottom: 3,
        width: '90%',
        backgroundColor: '#00Bcd4'
    },
    textStyle: {
        color: '#fff',
        fontSize: 14,
        textAlign: 'center'
    }
});


