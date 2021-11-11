import React, { Component } from 'react';
import {StyleSheet, Text, View, FlatList, ScrollView} from 'react-native';

class AdminTicket extends Component {

    constructor(props) {
        super(props);
        this.state = {
          
        };
    }

    renderSeparator = () => {  
        return (  
            <View  
                style={{  
                    height: 1,  
                    width: "100%",  
                    backgroundColor: "#000",  
                }}  
            />  
        );  
    };  
    //handling onPress action  
    getListViewItem = (item) => {  
        // Alert.alert(JSON.stringify(item.id));  
        this.props.navigation.navigate('AdminEdit', {
            JSON_ListView_Clicked_Item: JSON.stringify(item.id),
        })
    }
    
    componentDidMount() {
        this.timer = setInterval(() => this.getAlertWeb(), 1000);
    }
    
    async getAlertWeb() {

        // return fetch(`http://192.168.100.83/iglooapp/admin-date/ticket/${this.props.navigation.state.params.requestDate}`)
        return fetch(`http://202.51.177.67:8034/iglooapp/admin-date/ticket/${this.props.navigation.state.params.requestDate}`)
        .then(response => response.json())
        .then(responseJson => {     
            this.setState({
                tickets: responseJson.tickets
            }, function() {
            //comment
            });
        })
        .catch(error => {
            null;
        });
    }

    // static navigationOptions = {
    //     header: null
    // }


    render() {
        
        return (
            <ScrollView>
                <View style={styles.container}>
                    <Text style={{ fontSize: 25, textAlign: 'center', textDecorationLine: 'underline' }}>Ticket List of { this.props.navigation.state.params.requestDate }</Text>

                    <FlatList
                        data = {this.state.tickets}
                        renderItem={({item}) =>  
                            <Text style={styles.item}  onPress={this.getListViewItem.bind(this, item)}>{item.id}. Ticket ID</Text>
                        } ItemSeparatorComponent={this.renderSeparator}  keyExtractor={(item, index) => index.toString()}
                    />
                </View>
            </ScrollView>
        );
    }
}

export default AdminTicket

const styles = StyleSheet.create({
    container: {
        flex: 1,
        paddingTop: 22
    },
    item: {
        padding: 10,
        fontSize: 18,
        height: 44,
        textAlign: 'center',
    },
})