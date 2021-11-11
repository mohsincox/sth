import React, { Component } from 'react';
import { FlatList } from 'react-native';
import { Container, Picker, Header, Content, Thumbnail, Text, Left, Right, Icon, Title, Footer, FooterTab, Button, Body, Card, CardItem, H2 } from 'native-base';

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

    static navigationOptions = {
        header: null
    }

    render() {
        return (
            <Container>
                <Header>
                    <Left>
                        <Button transparent onPress={() => this.props.navigation.goBack()}>
                            <Icon name='arrow-back' />
                        </Button>
                    </Left>
                    <Body style={{  flex: 1,  justifyContent: 'center', alignItems: 'center' }}>
                        <Title>IGLOO</Title>
                    </Body>
                    <Right />
                </Header>
                <Content>
                    <Card>
                        <CardItem>
                            <Left>
                                <Thumbnail source={require('./img/igloo.jpg')} />
                                <Body>
                                    <Text>IGLOO</Text>
                                    <Text note style={{ fontStyle: 'italic' }}>A world of Great Taste!!</Text>
                                </Body>
                            </Left>
                        </CardItem>
                        <CardItem cardBody>
                            <FlatList
                                data = {this.state.ticket}
                                renderItem={({item}) => 
                                    <Content>
                                       <H2 >{item.id}. Sub: {item.subject}</H2>
                                       <Text>Name: <Text style={{fontWeight: "bold"}}>{item.customer_name}</Text></Text>
                                       <Text>Mobile: <Text style={{fontWeight: "bold"}}>{item.phone_number}</Text></Text>
                                       <Text>Address: <Text style={{fontWeight: "bold"}}>{item.customer_address}</Text></Text>
                                       <Text>A. Assigned: <Text style={{fontWeight: "bold"}}>{item.area_assigned}</Text></Text>
                                       <Text>Product: <Text style={{fontWeight: "bold"}}>{item.product_model}</Text></Text>
                                       <Text>Price: <Text style={{fontWeight: "bold"}}>{item.product_price}</Text></Text>
                                       <Card>
                                            <CardItem header>
                                                <H2>Select and Submit</H2>
                                            </CardItem>
                                            <Picker
                                                selectedValue={this.state.remarks}

                                                onValueChange={(itemValue, itemIndex) => this.setState({remarks: itemValue})} >
                                                <Picker.Item label='Please select an option...' value='' />
                                                { this.state.dataSource.map((item, key)=>(
                                                    <Picker.Item label={item.name} value={item.name} key={key} />)
                                                )}
                                            </Picker>
                                            <Button style={{margin:10}} primary block rounded  onPress={_ => this.userRemarks(item.id) }><Text>Submit</Text></Button>
                                        </Card>
                                    </Content>
                                } keyExtractor={(item, index) => index.toString()}
                            />
                        </CardItem>
                        <CardItem>
                            <FlatList 
                                data = {this.state.ticketDetails}
                                renderItem={({item}) => 
                                    <Content>
                                        <Text><Text style={{fontWeight: "bold"}}>{item.created_at}</Text>: {item.remarks}</Text>
                                    </Content>   
                                } keyExtractor={(item, index) => index.toString()}
                            />
                        </CardItem>
                    </Card>
                </Content>
                <Footer>
                    <FooterTab>
                        <Button vertical>
                            <Icon name="apps" />
                            <Text>User Panel</Text>
                        </Button>
                        <Button vertical active onPress={() => this.props.navigation.navigate('Home')}>
                            <Icon active name="person" />
                            <Text>Logout</Text>
                        </Button>
                    </FooterTab>
                </Footer>
            </Container>
        );
    }
};

export default UserEdit;
