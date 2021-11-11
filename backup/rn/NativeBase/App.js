import React, { Component } from "react";
import { TouchableOpacity, StatusBar, Keyboard } from 'react-native';
import { Container, View, Header, Content, List, ListItem, Text, Left, Body, Title, Item, Input, Right, Icon, Button, Footer, FooterTab, Badge } from "native-base";
export default class App extends Component {

  constructor(props) {
    super(props);
    this.state = {
      task: null,
      tasks: [],
      c_tasks: [],
    };
  }

  componentDidMount() {
    this.timer = setInterval(() => this.getAlertWeb(), 1000);
  }

  async getAlertWeb() {
    return fetch("http://192.168.100.83/laravel-test/tasks")
      .then(response => response.json())
      .then(responseJson => {     
        this.setState({
          tasks: responseJson.tasks,
          c_tasks: responseJson.c_tasks
        }, function() {
          //comment
        });
      })
      .catch(error => {
        null;
      });
  }

  addTask = () => {
    fetch('http://192.168.100.83/laravel-test/task', {
      method: 'POST',
      headers: {
        Accept: 'application/json',
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({
        "task": this.state.task,

       }),
    })
    .then((response) => response.json())
    .then((responseData) => {
            "POST Response",
            "Response Body -> " + JSON.stringify(responseData)
    })
    .done();   
    this.input._root.clear();
    Keyboard.dismiss();
};


completeTask = (id) => { 
  fetch(`http://192.168.100.83/laravel-test/task/${id}/complete`)
  .done();    
};

deleteTask = (id) => { 
  fetch(`http://192.168.100.83/laravel-test/task/${id}/delete`)
  .done();    
};

editTask = (id) => { 
    fetch(`http://192.168.100.83/laravel-test/task/${id}/edit`)
    .done();    
  };

  render() {
    return (
      <Container>

        <Header androidStatusBarColor="#1362af" style={{ backgroundColor: '#1976D2' }}>
          <Body style = {{ flex: 1, flexDirection: 'column', justifyContent: 'center', alignItems: 'center', }}>
            <Title>TODO</Title>
          </Body>
        </Header>
        <Content style = {{ marginLeft: 10, marginRight:10 }}>
        <Item rounded style = {{ marginBottom: 20, marginTop:20 }}>
          <Input placeholder="Add New Task" 
          onChangeText={input => this.setState({ task: input })} 
          ref={(ref) => { this.input = ref }}
          />
        </Item>
        <Button block light onPress={ () => this.addTask() } style = {{ marginLeft: 30, marginRight:30 }}>
            <Text>Add</Text>
        </Button>

          <List
            dataArray={this.state.tasks}
            renderRow={item => (
              <ListItem style = {{ marginTop:5, }}>
                <Left>
                  <Text style = {{ fontSize:17, color:'#5b5757', }}>{item.task}</Text>
                </Left>
                <Right>
                    <TouchableOpacity onPress={ () => {this.completeTask(item.id)} } hitSlop={{top: 20, bottom: 20, left: 50, right: 50}}>
                        <Icon name="ios-checkmark" style={{fontSize: 30, color: '#41f444'}} />
                    </TouchableOpacity>
                </Right>
                <Button>
                    <TouchableOpacity onPress={ () => {this.editTask(item.id)} } hitSlop={{top: 20, bottom: 20, left: 50, right: 50}}>
                        <Text>Edit</Text>
                    </TouchableOpacity>
                </Button>
              </ListItem>
            )}
          />
        <View style = {{ flex: 1, flexDirection: 'column', justifyContent: 'center', alignItems: 'center', marginTop:20 }}>
          <Text style = {{ fontSize:18, fontWeight: 'bold', color:'#d7dadd', }}>COMPLETED</Text>
        </View>
        <List
            dataArray={this.state.c_tasks}
            renderRow={item => (
              <ListItem style = {{ marginTop:5, }}>
                <Left>
                  <Text style = {{ fontSize:17, color:'#5b5757', }}>{item.task}</Text>
                </Left>
                <Right>   
                    <TouchableOpacity onPress={ () => {this.deleteTask(item.id)} } hitSlop={{top: 20, bottom: 20, left: 50, right: 50}}>                 
                        <Icon name="ios-close" style={{fontSize: 30, color: '#e01414'}} />
                    </TouchableOpacity>
                </Right>
                
              </ListItem>
            )}
          />

        </Content>

        <Footer>
          <FooterTab>
            <Button badge vertical>
              <Badge><Text>2</Text></Badge>
              <Icon name="apps" />
              <Text>Apps</Text>
            </Button>
            <Button vertical>
              <Icon name="camera" />
              <Text>Camera</Text>
            </Button>
            <Button active badge vertical>
              <Badge ><Text>51</Text></Badge>
              <Icon active name="navigate" />
              <Text>Navigate</Text>
            </Button>
            <Button vertical>
              <Icon name="person" />
              <Text>Contact</Text>
            </Button>
          </FooterTab>
        </Footer>
        
      </Container>
    );
  }
}
