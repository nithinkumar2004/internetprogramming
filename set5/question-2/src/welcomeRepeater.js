import React from 'react';

function WelcomeRepeater() {
    const times = 5; // Change this to repeat more/less
    const greetings = [];

    for (let i = 0; i < times; i++) {
        greetings.push(<h2 key={i}>Welcome!</h2>);
    }

    return (
        <div style={{ textAlign: 'center', marginTop: '50px' }}>
            {greetings}
        </div>
    );
}

export default WelcomeRepeater;
