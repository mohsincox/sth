<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP| MySQL | React.js | Axios Example</title>
    <script src= "https://unpkg.com/react@16/umd/react.production.min.js"></script>
    <script src= "https://unpkg.com/react-dom@16/umd/react-dom.production.min.js"></script>
    <!-- Load Babel Compiler -->
    <script src="https://unpkg.com/babel-standalone@6.15.0/babel.min.js"></script>

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

</head>
<body>
<div id='root'></div>

<script  type="text/babel">

class App extends React.Component {
  state = {
    contacts: []
    //contacts: [{"id":"1","name":"fghfgh","email":"fghfgh","city":"fghg","country":"ghj","job":"ghjgh"},{"id":"2","name":"ttrtr","email":"ttttt","city":"tttt","country":"ttt","job":"tttt"}]
  }

  
  

    componentDidMount() {
    const url = 'contacts2.php'
    axios.get(url).then(response => response.data)
    .then((data) => {
      this.setState({ contacts: data })
      // console.log(this.state.contacts)
      console.log(axios.get(url))
     })
  }
  


  render() {
    return (
        <React.Fragment>
        <h1>Contact Management</h1>
        <table border='1' width='100%' >
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Country</th>
            <th>City</th>
            <th>Job</th>     
        </tr>

        

        {this.state.contacts.map((contact) => (
        <tr>
            <td>{ contact.name }</td>
            <td>{ contact.email }</td>
            <td>{ contact.country }</td>
            <td>{ contact.city }</td>
            <td>{ contact.job }</td>
        </tr>
        ))}
        </table>
        </React.Fragment>
    );
  }
}

ReactDOM.render(<App />, document.getElementById('root'));
</script>
</body>
</html>