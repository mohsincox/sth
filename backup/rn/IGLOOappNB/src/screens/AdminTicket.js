import React, { Component } from 'react';
import {FlatList, View} from 'react-native';
import { Container, Header, Content, Thumbnail, ListItem, Text, Left, Right, Icon, Title, Footer, FooterTab, Button, Body, Card, CardItem } from 'native-base';

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
                {/* <H2 style={{ textDecorationLine: 'underline' }}>User Order List of { this.props.navigation.state.params.requestDate }</H2> */}
                        <CardItem header>
                            <Text>User Order List of { this.props.navigation.state.params.requestDate }</Text>
                        </CardItem>
                        <CardItem cardBody>
                            
                    <FlatList
                        data = {this.state.tickets}
                        renderItem={({item}) => 
                            <ListItem onPress={this.getListViewItem.bind(this, item)}>
                                <Text>{item.id}. Order ID: {item.id}</Text>
                            </ListItem>
                        } ItemSeparatorComponent={this.renderSeparator} keyExtractor={(item, index) => index.toString()}
                    />
                   
                        </CardItem>
                        <CardItem footer>
                            <Text>IGLOO</Text>
                        </CardItem>
                    </Card>
                </Content>
                <Footer>
                    <FooterTab>
                        <Button vertical>
                            <Icon name="apps" />
                            <Text>Admin Panel</Text>
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
}

export default AdminTicket
