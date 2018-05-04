
<style>
    .thumb-info {
        position: relative;
    }

    .thumb-info .thumb-info-title {
        -webkit-transition: all 0.3s;
        -moz-transition: all 0.3s;
        transition: all 0.3s;
        background: rgba(36, 27, 28, 0.9);
        bottom: 10%;
        color: #FFF;
        font-size: 18px;
        font-weight: 700;
        left: 0;
        letter-spacing: -1px;
        padding: 9px 11px 9px;
        position: absolute;
        text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.2);
        text-transform: uppercase;
        z-index: 1;
    }

    .thumb-info .thumb-info-inner {
        -webkit-transition: all 0.3s;
        -moz-transition: all 0.3s;
        transition: all 0.3s;
        display: block;
        white-space: nowrap;
    }

    .thumb-info .thumb-info-type {
        background-color: #cccccc;
        border-radius: 2px;
        display: inline-block;
        float: left;
        font-size: 12px;
        font-weight: 400;
        letter-spacing: 0;
        margin: 8px -2px -15px -2px;
        padding: 2px 9px;
        text-transform: none;
    }

    /* Widget - Widget Toggle/Expand */
    .widget-toggle-expand .widget-header {
        position: relative;
        margin: 0;
        padding: 5px 0;
    }

    .widget-toggle-expand .widget-header h6 {
        font-size: 13px;
        font-size: 1.3rem;
        margin: 0;
        padding: 0;
    }

    .widget-toggle-expand .widget-header .widget-toggle {
        font-size: 21px;
        font-size: 2.1rem;
        line-height: 21px;
        line-height: 2.1rem;
        position: absolute;
        right: 0;
        top: 0;
        cursor: pointer;
        text-align: center;
        color: #b4b4b4;
        -webkit-transform: rotate(45deg);
        -moz-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        -o-transform: rotate(45deg);
        transform: rotate(45deg);
        -webkit-transition-property: -webkit-transform;
        -moz-transition-property: -moz-transform;
        transition-property: transform;
        -webkit-transition-duration: 0.2s;
        -moz-transition-duration: 0.2s;
        transition-duration: 0.2s;
        -webkit-transition-timing-function: linear;
        -moz-transition-timing-function: linear;
        transition-timing-function: linear;
    }

    .widget-toggle-expand.widget-collapsed .widget-content-expanded {
        display: none;
    }

    .widget-toggle-expand.widget-collapsed .widget-header .widget-toggle {
        -webkit-transform: none;
        -moz-transform: none;
        -ms-transform: none;
        -o-transform: none;
        transform: none;
    }

    .text-xs {
        font-size: 10px;
        font-size: 1rem;
    }

    .text-sm {
        font-size: 13px;
        font-size: 1.3rem;
    }

    .text-md {
        font-size: 16px;
        font-size: 1.6rem;
    }

    .text-lg {
        font-size: 19px;
        font-size: 1.9rem;
    }

    .text-xl {
        font-size: 22px;
        font-size: 2.2rem;
    }

    .text-muted {
        color: #999999 !important;
    }

    html.dark .text-muted {
        color: #505461 !important;
    }

    .text-primary {
        color: #cccccc !important;
    }

    .text-secondary {
        color: #e36159 !important;
    }

    .text-tertiary {
        color: #2baab1 !important;
    }

    .text-quartenary {
        color: #734ba9 !important;
    }

    .text-success {
        color: #47a447 !important;
    }

    .text-warning {
        color: #ed9c28 !important;
    }

    .text-danger {
        color: #d2322d !important;
    }

    .text-info {
        color: #5bc0de !important;
    }

    .text-dark {
        color: #171717 !important;
    }

    .text-primary-inverse {
        color: white !important;
    }

    .text-secondary-inverse {
        color: white !important;
    }

    .text-tertiary-inverse {
        color: white !important;
    }

    .text-quartenary-inverse {
        color: white !important;
    }

    .text-success-inverse {
        color: white !important;
    }

    .text-warning-inverse {
        color: white !important;
    }

    .text-danger-inverse {
        color: white !important;
    }

    .text-info-inverse {
        color: white !important;
    }

    .text-dark-inverse {
        color: white !important;
    }

    /* weights */
    .text-light {
        font-weight: 300;
    }

    .text-normal {
        font-weight: 400;
    }

    .text-semibold {
        font-weight: 600;
    }

    .text-bold {
        font-weight: 700;
    }

    .text-uppercase {
        text-transform: uppercase;
    }

    .text-lowercase {
        text-transform: lowercase;
    }

    .text-capitalize {
        text-transform: capitalize;
    }
    /* Widget - Simple User List */
    ul.simple-user-list {
        list-style: none;
        padding: 0;
    }

    ul.simple-user-list li {
        margin: 0 0 20px;
    }

    ul.simple-user-list li .image {
        float: left;
        margin: 0 10px 0 0;
    }

    ul.simple-user-list li .title {
        color: #000011;
        display: block;
        line-height: 1.334;
    }

    ul.simple-user-list li .message {
        display: block;
        font-size: 11px;
        font-size: 1.1rem;
        line-height: 1.334;
    }

    /* Widget - Simple Post List */
    ul.simple-post-list {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    ul.simple-post-list li {
        border-bottom: 1px dotted #E2E2E2;
        padding: 15px 0;
    }

    ul.simple-post-list li:after {
        content: "";
        display: table;
        clear: both;
    }

    ul.simple-post-list li::last-child {
        border-bottom: 0;
    }

    ul.simple-post-list li .post-image {
        float: left;
        margin-right: 12px;
    }

    ul.simple-post-list li .post-meta {
        color: #888;
        font-size: 0.8em;
    }

    ul.simple-post-list li:last-child {
        border-bottom: none;
    }

    /* Widget - Simple Todo List */
    ul.simple-todo-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    ul.simple-todo-list li {
        position: relative;
        padding: 0 0 0 20px;
    }

    ul.simple-todo-list li.completed {
        color: #A7A7A7;
    }

    ul.simple-todo-list li.completed:before {
        position: absolute;
        top: 3px;
        left: 0;
        font-family: FontAwesome;
        content: "\f00c";
        z-index: 1;
    }

    /*Paneles********************************************************/

    .panel-heading {
        background: #f6f6f6;
        border-radius: 5px 5px 0 0;
        border-bottom: 1px solid #DADADA;
        padding: 18px;
        position: relative;
    }

    .panel-heading.bg-primary {
        background: #cccccc;
        color: white;
        border-bottom: 0 none;
        border-right: 0 none;
    }

    .panel-heading.bg-secondary {
        background: #e36159;
        color: white;
        border-bottom: 0 none;
        border-right: 0 none;
    }

    .panel-heading.bg-tertiary {
        background: #2baab1;
        color: white;
        border-bottom: 0 none;
        border-right: 0 none;
    }

    .panel-heading.bg-quartenary {
        background: #734ba9;
        color: white;
        border-bottom: 0 none;
        border-right: 0 none;
    }

    .panel-heading.bg-success {
        background: #47a447;
        color: white;
        border-bottom: 0 none;
        border-right: 0 none;
    }

    .panel-heading.bg-warning {
        background: #ed9c28;
        color: white;
        border-bottom: 0 none;
        border-right: 0 none;
    }

    .panel-heading.bg-danger {
        background: #d2322d;
        color: white;
        border-bottom: 0 none;
        border-right: 0 none;
    }

    .panel-heading.bg-info {
        background: #5bc0de;
        color: white;
        border-bottom: 0 none;
        border-right: 0 none;
    }

    .panel-heading.bg-dark {
        background: #171717;
        color: white;
        border-bottom: 0 none;
        border-right: 0 none;
    }

    .panel-heading.bg-white {
        background: #fff;
        border-bottom: 0 none;
        border-right: 0 none;
    }

    .panel-actions {
        right: 15px;
        position: absolute;
        top: 15px;
    }

    .panel-actions a {
        background-color: transparent;
        border-radius: 2px;
        color: #b4b4b4;
        font-size: 14px;
        height: 24px;
        line-height: 24px;
        text-align: center;
        width: 24px;
    }

    .panel-actions a:hover {
        background-color: #eeeeee;
        color: #b4b4b4;
        text-decoration: none;
    }

    .panel-actions a, .panel-actions a:focus, .panel-actions a:hover, .panel-actions a:active, .panel-actions a:visited {
        outline: none !important;
        text-decoration: none !important;
    }

    .panel-title {
        color: #33353f;
        font-size: 20px;
        font-weight: 400;
        line-height: 20px;
        padding: 0;
        text-transform: none;
    }

    .panel-subtitle {
        color: #808697;
        font-size: 12px;
        line-height: 1.2em;
        margin: 7px 0 0;
        padding: 0;
    }

    .panel-body {
        background: #fdfdfd;
        -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
        border-radius: 5px;
    }

    .panel-body-nopadding {
        padding: 0;
    }

    .panel-heading + .panel-body {
        border-radius: 0 0 5px 5px;
    }

    .panel-footer {
        border-radius: 0 0 5px 5px;
        margin-top: -5px;
    }

    .panel-footer-btn-group {
        display: table;
        width: 100%;
        padding: 0;
    }

    .panel-footer-btn-group a {
        background-color: #f5f5f5;
        display: table-cell;
        width: 1%;
        border-left: 1px solid #ddd;
        padding: 10px 15px;
        text-decoration: none;
    }

    .panel-footer-btn-group a:hover {
        background-color: #f0f0f0;
        box-shadow: 0 0 7px rgba(0, 0, 0, 0.1) inset;
    }

    .panel-footer-btn-group a:first-child {
        border-left: none;
    }

    .panel-body.bg-primary {
        background: #cccccc;
        color: white;
    }

    .panel-body.bg-secondary {
        background: #e36159;
        color: white;
    }

    .panel-body.bg-tertiary {
        background: #2baab1;
        color: white;
    }

    .panel-body.bg-quartenary {
        background: #734ba9;
        color: white;
    }

    .panel-body.bg-success {
        background: #47a447;
        color: white;
    }

    .panel-body.bg-warning {
        background: #ed9c28;
        color: white;
    }

    .panel-body.bg-danger {
        background: #d2322d;
        color: white;
    }

    .panel-body.bg-info {
        background: #5bc0de;
        color: white;
    }

    .panel-body.bg-dark {
        background: #171717;
        color: white;
    }

    .panel-featured {
        border-top: 3px solid #33353f;
    }

    .panel-featured .panel-heading {
        border-radius: 0;
    }

    .panel-featured-top {
        border-top: 3px solid #33353f;
    }

    .panel-featured-right {
        border-right: 3px solid #33353f;
    }

    .panel-featured-bottom {
        border-bottom: 3px solid #33353f;
    }

    .panel-featured-left {
        border-left: 3px solid #33353f;
    }

    .panel-featured-primary {
        border-color: #cccccc;
    }

    .panel-featured-primary .panel-title {
        color: #cccccc;
    }

    .panel-featured-secondary {
        border-color: #e36159;
    }

    .panel-featured-secondary .panel-title {
        color: #e36159;
    }

    .panel-featured-tertiary {
        border-color: #2baab1;
    }

    .panel-featured-tertiary .panel-title {
        color: #2baab1;
    }

    .panel-featured-quartenary {
        border-color: #734ba9;
    }

    .panel-featured-quartenary .panel-title {
        color: #734ba9;
    }

    .panel-featured-success {
        border-color: #47a447;
    }

    .panel-featured-success .panel-title {
        color: #47a447;
    }

    .panel-featured-warning {
        border-color: #ed9c28;
    }

    .panel-featured-warning .panel-title {
        color: #ed9c28;
    }

    .panel-featured-danger {
        border-color: #d2322d;
    }

    .panel-featured-danger .panel-title {
        color: #d2322d;
    }

    .panel-featured-info {
        border-color: #5bc0de;
    }

    .panel-featured-info .panel-title {
        color: #5bc0de;
    }

    .panel-featured-dark {
        border-color: #171717;
    }

    .panel-featured-dark .panel-title {
        color: #171717;
    }

    .panel-highlight .panel-heading {
        background-color: #cccccc;
        border-color: #cccccc;
        color: #fff;
    }

    .panel-highlight .panel-title {
        color: #fff;
    }

    .panel-highlight .panel-subtitle {
        color: #fff;
        color: rgba(255, 255, 255, 0.7);
    }

    .panel-highlight .panel-actions a {
        background-color: rgba(0, 0, 0, 0.1);
        color: #fff;
    }

    .panel-highlight .panel-body {
        background-color: #cccccc;
        color: #fff;
    }

    .panel-highlight-title .panel-heading {
        background-color: #2BAAB1;
    }

    .panel-highlight-title .panel-title {
        color: #fff;
    }

    .panel-highlight-title .panel-subtitle {
        color: #fff;
        color: rgba(255, 255, 255, 0.7);
    }

    .panel-highlight-title .panel-actions a {
        background-color: rgba(0, 0, 0, 0.1);
        color: #fff;
    }

    .panel-heading-icon {
        margin: 0 auto;
        font-size: 42px;
        font-size: 4.2rem;
        width: 90px;
        height: 90px;
        line-height: 90px;
        text-align: center;
        color: #fff;
        background-color: rgba(0, 0, 0, 0.1);
        -webkit-border-radius: 55px;
        border-radius: 55px;
    }

    .panel-heading-icon.bg-primary {
        background: #cccccc;
        color: white;
    }

    .panel-heading-icon.bg-secondary {
        background: #e36159;
        color: white;
    }

    .panel-heading-icon.bg-tertiary {
        background: #2baab1;
        color: white;
    }

    .panel-heading-icon.bg-quartenary {
        background: #734ba9;
        color: white;
    }

    .panel-heading-icon.bg-success {
        background: #47a447;
        color: white;
    }

    .panel-heading-icon.bg-warning {
        background: #ed9c28;
        color: white;
    }

    .panel-heading-icon.bg-danger {
        background: #d2322d;
        color: white;
    }

    .panel-heading-icon.bg-info {
        background: #5bc0de;
        color: white;
    }

    .panel-heading-icon.bg-dark {
        background: #171717;
        color: white;
    }

    .panel-heading-profile-picture img {
        display: block;
        margin: 0 auto;
        width: 100px;
        height: 100px;
        border: 4px solid #fff;
        -webkit-border-radius: 50px;
        border-radius: 50px;
    }

    .panel-icon {
        color: #fff;
        font-size: 42px;
        float: left;
    }

    .panel-icon ~ .panel-title, .panel-icon ~ .panel-subtitle {
        margin-left: 64px;
    }


    /*End paneles****************************************************/


    /* Widget - Simple Card List */
    ul.simple-card-list {
        list-style: none;
        padding: 0;
    }

    ul.simple-card-list li {
        padding: 10px 15px;
        margin: 15px 0;
        -webkit-border-radius: 7px;
        border-radius: 7px;
    }

    ul.simple-card-list li h3 {
        font-size: 26px;
        font-size: 2.6rem;
        font-weight: 600;
        margin: 0;
    }

    ul.simple-card-list li p {
        margin: 0;
        opacity: .7;
    }

    .simple-card-list li.primary {
        background: #cccccc;
        color: white;
    }

    .simple-card-list li.success {
        background: #47a447;
        color: white;
    }

    .simple-card-list li.warning {
        background: #ed9c28;
        color: white;
    }

    .simple-card-list li.danger {
        background: #d2322d;
        color: white;
    }

    .simple-card-list li.info {
        background: #5bc0de;
        color: white;
    }

    .simple-card-list li.dark {
        background: #171717;
        color: white;
    }

    div.simple-card-list {
        display: table;
        width: 100%;
    }

    div.simple-card-list .card {
        display: table-cell;
    }

    div.simple-card-list .card .card-content {
        background-color: rgba(0, 0, 0, 0.1);
        -webkit-border-radius: 3px;
        border-radius: 3px;
        margin: 0 7px;
        padding: 5px;
    }

    div.simple-card-list .card h3 {
        font-size: 26px;
        font-size: 2.6rem;
        font-weight: 600;
        margin: 0;
    }

    div.simple-card-list .card p {
        margin: 0;
        opacity: .7;
    }

    /* Widget - Simple Button List */
    ul.simple-bullet-list {
        list-style: none;
        padding: 0;
    }

    ul.simple-bullet-list li {
        position: relative;
        padding: 0 0 0 20px;
        margin: 0 0 10px;
    }

    ul.simple-bullet-list li:before {
        border: 6px solid #cccccc;
        border-radius: 100px;
        content: '';
        display: inline-block;
        left: 0;
        margin: 0;
        position: absolute;
        top: 5px;
        z-index: 2;
    }

    ul.simple-bullet-list li .title {
        display: block;
        font-weight: 700;
        font-size: 14px;
        font-size: 1.4rem;
        line-height: 1.4;
        color: #171717;
    }

    ul.simple-bullet-list li .description {
        display: block;
        color: #999999;
        font-size: 11px;
        font-size: 1.1rem;
        line-height: 1.334;
    }

    ul.simple-bullet-list li.red:before {
        border-color: #d64b4b;
    }

    ul.simple-bullet-list li.green:before {
        border-color: #4dd79c;
    }

    ul.simple-bullet-list li.blue:before {
        border-color: #0090d9;
    }

    ul.simple-bullet-list li.orange:before {
        border-color: #E2A917;
    }
    /**End card**/


    /**************************************************/

    .text-xs {
        font-size: 10px;
        font-size: 1rem;
    }

    .text-sm {
        font-size: 13px;
        font-size: 1.3rem;
    }

    .text-md {
        font-size: 16px;
        font-size: 1.6rem;
    }

    .text-lg {
        font-size: 19px;
        font-size: 1.9rem;
    }

    .text-xl {
        font-size: 22px;
        font-size: 2.2rem;
    }

    .text-muted {
        color: #999999 !important;
    }

    html.dark .text-muted {
        color: #505461 !important;
    }

    .text-primary {
        color: #cccccc !important;
    }

    .text-secondary {
        color: #e36159 !important;
    }

    .text-tertiary {
        color: #2baab1 !important;
    }

    .text-quartenary {
        color: #734ba9 !important;
    }

    .text-success {
        color: #47a447 !important;
    }

    .text-warning {
        color: #ed9c28 !important;
    }

    .text-danger {
        color: #d2322d !important;
    }

    .text-info {
        color: #5bc0de !important;
    }

    .text-dark {
        color: #171717 !important;
    }

    .text-primary-inverse {
        color: white !important;
    }

    .text-secondary-inverse {
        color: white !important;
    }

    .text-tertiary-inverse {
        color: white !important;
    }

    .text-quartenary-inverse {
        color: white !important;
    }

    .text-success-inverse {
        color: white !important;
    }

    .text-warning-inverse {
        color: white !important;
    }

    .text-danger-inverse {
        color: white !important;
    }

    .text-info-inverse {
        color: white !important;
    }

    .text-dark-inverse {
        color: white !important;
    }

    /* weights */
    .text-light {
        font-weight: 300;
    }

    .text-normal {
        font-weight: 400;
    }

    .text-semibold {
        font-weight: 600;
    }

    .text-bold {
        font-weight: 700;
    }

    .text-uppercase {
        text-transform: uppercase;
    }

    .text-lowercase {
        text-transform: lowercase;
    }

    .text-capitalize {
        text-transform: capitalize;
    }

    .rounded {
        border-radius: 5px;
    }

    .b-thin {
        border-width: 3px;
    }

    .b-normal {
        border-width: 5px;
    }

    .b-thick {
        border-width: 7px;
    }

    /* Spacements */
    /* spacement top & bottom */
    .m-none {
        margin: 0 !important;
    }

    .m-auto {
        margin: 0 auto !important;
    }

    .m-xs {
        margin: 5px !important;
    }

    .m-sm {
        margin: 10px !important;
    }

    .m-md {
        margin: 15px !important;
    }

    .m-lg {
        margin: 20px !important;
    }

    .m-xl {
        margin: 25px !important;
    }

    .m-xlg {
        margin: 30px !important;
    }

    /* spacement top	*/
    .mt-none {
        margin-top: 0 !important;
    }

    .mt-xs {
        margin-top: 5px !important;
    }

    .mt-sm {
        margin-top: 10px !important;
    }

    .mt-md {
        margin-top: 15px !important;
    }

    .mt-lg {
        margin-top: 20px !important;
    }

    .mt-xl {
        margin-top: 25px !important;
    }

    .mt-xlg {
        margin-top: 30px !important;
    }

    /* spacement bottom	*/
    .mb-none {
        margin-bottom: 0 !important;
    }

    .mb-xs {
        margin-bottom: 5px !important;
    }

    .mb-sm {
        margin-bottom: 10px !important;
    }

    .mb-md {
        margin-bottom: 15px !important;
    }

    .mb-lg {
        margin-bottom: 20px !important;
    }

    .mb-xl {
        margin-bottom: 25px !important;
    }

    .mb-xlg {
        margin-bottom: 30px !important;
    }

    /* spacement left	*/
    .mr-none {
        margin-left: 0 !important;
    }

    .ml-xs {
        margin-left: 5px !important;
    }

    .ml-sm {
        margin-left: 10px !important;
    }

    .ml-md {
        margin-left: 15px !important;
    }

    .ml-lg {
        margin-left: 20px !important;
    }

    .ml-xl {
        margin-left: 25px !important;
    }

    .ml-xlg {
        margin-left: 30px !important;
    }

    /* spacement right	*/
    .mr-none {
        margin-right: 0 !important;
    }

    .mr-xs {
        margin-right: 5px !important;
    }

    .mr-sm {
        margin-right: 10px !important;
    }

    .mr-md {
        margin-right: 15px !important;
    }

    .mr-lg {
        margin-right: 20px !important;
    }

    .mr-xl {
        margin-right: 25px !important;
    }

    .mr-xlg {
        margin-right: 30px !important;
    }

    /* Spacement Padding */
    .p-none {
        padding: 0 !important;
    }

    .p-xs {
        padding: 5px !important;
    }

    .p-sm {
        padding: 10px !important;
    }

    .p-md {
        padding: 15px !important;
    }

    .p-lg {
        padding: 20px !important;
    }

    .p-xl {
        padding: 25px !important;
    }

    .p-xlg {
        padding: 30px !important;
    }

    /* spacement top	*/
    .pt-none {
        padding-top: 0 !important;
    }

    .pt-xs {
        padding-top: 5px !important;
    }

    .pt-sm {
        padding-top: 10px !important;
    }

    .pt-md {
        padding-top: 15px !important;
    }

    .pt-lg {
        padding-top: 20px !important;
    }

    .pt-xl {
        padding-top: 25px !important;
    }

    .pt-xlg {
        padding-top: 30px !important;
    }

    /* spacement bottom	*/
    .pb-none {
        padding-bottom: 0 !important;
    }

    .pb-xs {
        padding-bottom: 5px !important;
    }

    .pb-sm {
        padding-bottom: 10px !important;
    }

    .pb-md {
        padding-bottom: 15px !important;
    }

    .pb-lg {
        padding-bottom: 20px !important;
    }

    .pb-xl {
        padding-bottom: 25px !important;
    }

    .pb-xlg {
        padding-bottom: 30px !important;
    }

    /* spacement left	*/
    .pr-none {
        padding-left: 0 !important;
    }

    .pl-xs {
        padding-left: 5px !important;
    }

    .pl-sm {
        padding-left: 10px !important;
    }

    .pl-md {
        padding-left: 15px !important;
    }

    .pl-lg {
        padding-left: 20px !important;
    }

    .pl-xl {
        padding-left: 25px !important;
    }

    .pl-xlg {
        padding-left: 30px !important;
    }

    /* spacement right	*/
    .pr-none {
        padding-right: 0 !important;
    }

    .pr-xs {
        padding-right: 5px !important;
    }

    .pr-sm {
        padding-right: 10px !important;
    }

    .pr-md {
        padding-right: 15px !important;
    }

    .pr-lg {
        padding-right: 20px !important;
    }

    .pr-xl {
        padding-right: 25px !important;
    }

    .pr-xlg {
        padding-right: 30px !important;
    }

    .ib {
        display: inline-block;
        vertical-align: top;
    }

    .va-middle {
        vertical-align: middle;
    }

    .ws-nowrap {
        white-space: nowrap;
    }

    .ws-normal {
        white-space: normal;
    }

    .bg-default {
        background: #ebebeb;
        color: #777777;
    }

    .bg-primary {
        background: #cccccc;
        color: white;
    }

    .bg-secondary {
        background: #e36159;
        color: white;
    }

    .bg-tertiary {
        background: #2baab1;
        color: white;
    }

    .bg-quartenary {
        background: #734ba9;
        color: white;
    }

    .bg-success {
        background: #47a447;
        color: white;
    }

    .bg-warning {
        background: #ed9c28;
        color: white;
    }

    .bg-danger {
        background: #d2322d;
        color: white;
    }

    .bg-info {
        background: #5bc0de;
        color: white;
    }

    .bg-dark {
        background: #171717;
        color: white;
    }



    /***************************************************/



    /* Simple List */
    ul.simple-bullet-list li:before {
        border-color: #0088cc;
    }
    /* Simple Card List */
    .simple-card-list li.primary {
        background: #0088cc;
    }
    /* Search Results */
    .search-content .search-toolbar .nav-pills li.active a {
        color: #0088cc;
        border-bottom-color: #0088cc;
    }
    .search-results-list .result-thumb .fa {
        background: #0088cc;
    }





    /* tabs */
    .tabs {
        -moz-border-radius: 4px;
        -webkit-border-radius: 4px;
        border-radius: 4px;
        margin-bottom: 35px;
    }

    /* navigation */
    .nav-tabs {
        margin: 0;
        font-size: 0;
    }

    .nav-tabs li {
        display: inline-block;
        float: none;
    }

    .nav-tabs li:last-child a {
        margin-right: 0;
    }

    .nav-tabs li a {
        border-radius: 5px 5px 0 0;
        font-size: 13px;
        font-size: 1.3rem;
        margin-right: 1px;
    }

    .nav-tabs li a, .nav-tabs li a:hover {
        background: #f4f4f4;
        border-bottom: none;
        border-left: 1px solid #eeeeee;
        border-right: 1px solid #eeeeee;
        border-top: 3px solid #dddddd;
        color: #555555;
    }

    .nav-tabs li a:hover {
        border-bottom-color: transparent;
        border-top: 3px solid #555555;
        box-shadow: none;
    }

    .nav-tabs li a:active, .nav-tabs li a:focus {
        border-bottom: 0;
    }

    .nav-tabs li.active a,
    .nav-tabs li.active a:hover,
    .nav-tabs li.active a:focus {
        background: white;
        border-left-color: #eeeeee;
        border-right-color: #eeeeee;
        border-top: 3px solid #555555;
        color: #555555;
    }

    /* content */
    .tab-content {
        border-radius: 0 0 4px 4px;
        box-shadow: 0 1px 5px 0 rgba(0, 0, 0, 0.04);
        background-color: white;
        border: 1px solid #eeeeee;
        border-top: 0 !important;
        margin-top: 0 !important;
        padding: 15px;
    }

    /* content - footer inside */
    .tab-content .panel-footer {
        margin: -15px;
        margin-top: 15px;
    }

    .tab-content .panel-footer {
        padding: 10px 15px;
        background-color: #f5f5f5 !important;
        border-top: 1px solid #dddddd;
        border-bottom-right-radius: 3px;
        border-bottom-left-radius: 3px;
    }

    /* Justified */
    .nav-tabs.nav-justified {
        margin-bottom: -1px;
        border-left: 1px solid transparent;
        border-right: 1px solid transparent;
    }

    .nav-tabs.nav-justified li {
        margin-bottom: 0;
    }

    .nav-tabs.nav-justified li:first-child a,
    .nav-tabs.nav-justified li:first-child a:hover {
        border-radius: 5px 0 0 0;
        border-left: none;
    }

    .nav-tabs.nav-justified li:last-child a,
    .nav-tabs.nav-justified li:last-child a:hover {
        border-radius: 0 5px 0 0;
        border-right: none;
    }

    .nav-tabs.nav-justified li a {
        border-left: none;
        border-right: none;
        border-bottom: 1px solid #DDD;
        border-radius: 0;
        margin-right: 0;
    }

    .nav-tabs.nav-justified li a:hover, .nav-tabs.nav-justified li a:focus {
        border-bottom: 1px solid #DDD;
        border-left: none;
        border-right: none;
    }

    .nav-tabs.nav-justified li.active a,
    .nav-tabs.nav-justified li.active a:hover,
    .nav-tabs.nav-justified li.active a:focus {
        background: white;
        border-left-color: #eeeeee;
        border-right-color: #eeeeee;
        border-top: 3px solid #555555;
        color: #555555;
    }

    .nav-tabs.nav-justified li.active a {
        border-bottom: 1px solid #FFF;
    }

    .nav-tabs.nav-justified li.active a, .nav-tabs.nav-justified li.active a:hover, .nav-tabs.nav-justified li.active a:focus {
        border-top-color: #555555;
        border-top-width: 3px;
        border-left: none;
        border-right: none;
    }

    .nav-tabs.nav-justified li.active a:hover {
        border-bottom: 1px solid #FFF;
    }

    /* Bottom Tabs */
    .tabs.tabs-bottom .tab-content {
        border-radius: 4px 4px 0 0;
        border-bottom: 0;
        border-top: 1px solid #eeeeee;
    }

    .tabs.tabs-bottom .nav-tabs {
        border-bottom: none;
        border-top: 1px solid #dddddd;
    }

    .tabs.tabs-bottom .nav-tabs li {
        margin-bottom: 0;
        margin-top: -1px;
    }

    .tabs.tabs-bottom .nav-tabs li:last-child a {
        margin-right: 0;
    }

    .tabs.tabs-bottom .nav-tabs li a {
        border-radius: 0 0 5px 5px;
        font-size: 13px;
        font-size: 1.3rem;
        margin-right: 1px;
    }

    .tabs.tabs-bottom .nav-tabs li a, .tabs.tabs-bottom .nav-tabs li a:hover, .tabs.tabs-bottom .nav-tabs li a:focus, .tabs.tabs-bottom .nav-tabs li a:active {
        border-bottom: 3px solid #dddddd;
        border-top: 1px solid #dddddd;
    }

    .tabs.tabs-bottom .nav-tabs li a:hover, .tabs.tabs-bottom .nav-tabs li a:focus, .tabs.tabs-bottom .nav-tabs li a:active {
        border-bottom: 3px solid #555555;
        border-top: 1px solid #dddddd;
    }

    .tabs.tabs-bottom .nav-tabs li.active a,
    .tabs.tabs-bottom .nav-tabs li.active a:hover,
    .tabs.tabs-bottom .nav-tabs li.active a:focus {
        border-bottom: 3px solid #555555;
        border-top-color: transparent;
    }

    /* Bottom Tabs with Justified Nav */
    .tabs.tabs-bottom .nav.nav-tabs.nav-justified {
        border-top: none;
    }

    .tabs.tabs-bottom .nav.nav-tabs.nav-justified li a {
        margin-right: 0;
        border-top-color: #dddddd;
    }

    .tabs.tabs-bottom .nav.nav-tabs.nav-justified li:first-child a {
        border-radius: 0 0 0 5px;
    }

    .tabs.tabs-bottom .nav.nav-tabs.nav-justified li:last-child a {
        margin-right: 0;
        border-radius: 0 0 5px 0;
    }

    .tabs.tabs-bottom .nav.nav-tabs.nav-justified li.active a,
    .tabs.tabs-bottom .nav.nav-tabs.nav-justified li.active a:hover,
    .tabs.tabs-bottom .nav.nav-tabs.nav-justified li.active a:focus {
        border-top-color: transparent;
    }

    /* Vertical */
    .tabs-vertical {
        display: table;
        width: 100%;
    }

    .tabs-vertical .tab-content {
        display: table-cell;
        vertical-align: top;
    }

    .tabs-vertical .nav-tabs {
        border-bottom: none;
        display: table-cell;
        height: 100%;
        float: none;
        padding: 0;
        vertical-align: top;
    }

    .tabs-vertical .nav-tabs > li {
        display: block;
    }

    .tabs-vertical .nav-tabs > li a {
        border-radius: 0;
        display: block;
        padding-top: 10px;
    }

    .tabs-vertical .nav-tabs > li a, .tabs-vertical .nav-tabs > li a:hover, .tabs-vertical .nav-tabs > li a:focus {
        border-bottom: none;
        border-top: none;
    }

    .tabs-vertical .nav-tabs > li.active a,
    .tabs-vertical .nav-tabs > li.active a:hover, .tabs-vertical .nav-tabs > li.active:focus {
        border-top: none;
    }

    /* Vertical - Left Side */
    .tabs-left .tab-content {
        border-radius: 0 5px 5px 5px;
        border-left: none;
    }

    .tabs-left .nav-tabs > li {
        margin-right: -1px;
    }

    .tabs-left .nav-tabs > li:first-child a {
        border-radius: 5px 0 0 0;
    }

    .tabs-left .nav-tabs > li:last-child a {
        border-radius: 0 0 0 5px;
    }

    .tabs-left .nav-tabs > li a {
        border-right: 1px solid #eeeeee;
        border-left: 3px solid #dddddd;
        margin-right: 1px;
        margin-left: -3px;
    }

    .tabs-left .nav-tabs > li a:hover {
        border-left-color: #555555;
    }

    .tabs-left .nav-tabs > li.active a,
    .tabs-left .nav-tabs > li.active a:hover,
    .tabs-left .nav-tabs > li.active a:focus {
        border-left: 3px solid #555555;
        border-right-color: #FFF;
    }

    /* Vertical - Right Side */
    .tabs-right .tab-content {
        border-radius: 5px 0 5px 5px;
        border-right: none;
    }

    .tabs-right .nav-tabs > li {
        margin-left: -1px;
    }

    .tabs-right .nav-tabs > li:first-child a {
        border-radius: 0 5px 0 0;
    }

    .tabs-right .nav-tabs > li:last-child a {
        border-radius: 0 0 5px 0;
    }

    .tabs-right .nav-tabs > li a {
        border-right: 3px solid #dddddd;
        border-left: 1px solid #eeeeee;
        margin-right: 1px;
        margin-left: 1px;
    }

    .tabs-right .nav-tabs > li a:hover {
        border-right-color: #555555;
    }

    .tabs-right .nav-tabs > li.active a,
    .tabs-right .nav-tabs > li.active a:hover,
    .tabs-right .nav-tabs > li.active a:focus {
        border-right: 3px solid #555555;
        border-left: 1px solid #FFF;
    }





</style>

<div class="content-app fixed-header">
    <!-- app header -->
    <div class="app-header">
        <div class="pull-right">
            <a class="btn btn-default" role="button">Left</a>
            <a class="btn btn-default" role="button">Midle</a>
            <a class="btn btn-default" role="button">Right</a>
        </div>
        <ol class="breadcrumb bg-none pull-left hide-xs">
            <li><a href="#">Home</a></li>
            <li><a href="#">Library</a></li>
            <li class="active">Data</li>
        </ol>
        <!-- <h3 class="app-title">Drop App Modules</h3> -->
    </div><!-- /app header -->

    <!-- app body -->
    <div class="app-body">

        <div class="row">
            <div class="col-md-4 col-lg-3">

                <section class="panel">
                    <div class="panel-body">
                        <div class="thumb-info mb-md">

                            <img src="<?= base_url(); ?>/public/template/ministerio/images/icons/default_profile.jpg" 
                                 class="rounded img-responsive" alt="John Doe">
                            <div class="thumb-info-title">
                                <span class="thumb-info-inner"><?= ucfirst($this->session->userdata('us_usuario')); ?></span>
                                <span class="thumb-info-type"><?= ucfirst($this->session->userdata('ro_nombre')); ?></span>
                            </div>
                        </div>

                        <div class="widget-toggle-expand mb-md">
                            <div class="widget-header">
                                <h6>Porcentaje del perfil</h6>
                                <div class="widget-toggle">+</div>
                            </div>
                            <div class="widget-content-collapsed">
                                <div class="progress progress-xs light">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                        60%
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content-expanded" style="">
                                <ul class="simple-todo-list">
                                    <li class="completed">Actualizar foto de perfil</li>
                                    <li class="completed">Cambiar informacion personal</li>
                                    <li>Agregar tercero</li>
                                    <li>Agregar su institucion</li>
                                    <li>Actualizar redes sociales</li>
                                    <li>Sigues a alguien</li>
                                </ul>
                            </div>
                        </div>

                        <hr class="dotted short">

                        <h6 class="text-muted">Acerca de</h6>
                        <p></p>
                        <div class="clearfix">
                            <a class="text-uppercase text-muted pull-right" href="#">(Ver TODO)</a>
                        </div>

                        <hr class="dotted short">

                        <div class="social-icons-list">
                            <a rel="tooltip" data-placement="bottom" target="_blank" href="http://www.facebook.com" data-original-title="Facebook"><i class="fa fa-facebook"></i><span>Facebook</span></a>
                            <a rel="tooltip" data-placement="bottom" href="http://www.twitter.com" data-original-title="Twitter"><i class="fa fa-twitter"></i><span>Twitter</span></a>
                            <a rel="tooltip" data-placement="bottom" href="http://www.linkedin.com" data-original-title="Linkedin"><i class="fa fa-linkedin"></i><span>Linkedin</span></a>
                        </div>

                    </div>
                </section>



            </div>
            <div class="col-md-8 col-lg-6">

                <div class="tabs">
                    <ul class="nav nav-tabs tabs-primary">
                        <!--                        <li class="">
                                                    <a href="#overview" data-toggle="tab" aria-expanded="false">Overview</a>
                                                </li>-->
                        <li class="active">
                            <a href="#tab_editar_usuario" data-toggle="tab" aria-expanded="true">
                                Editar usuario
                            </a>
                        </li>
                        <li>
                            <a href="#tab_edit_tercero" data-toggle="tab" aria-expanded="true">
                                Editar tercero
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <!--                        <div id="overview" class="tab-pane">
                                                    <h4 class="mb-md">Update Status</h4>
                        
                                                    <section class="simple-compose-box mb-xlg">
                                                        <form method="get" action="/">
                                                            <textarea name="message-text" data-plugin-textarea-autosize="" placeholder="What's on your mind?" rows="1" style="overflow: hidden; word-wrap: break-word; resize: none; height: 59px;"></textarea>
                                                        </form>
                                                        <div class="compose-box-footer">
                                                            <ul class="compose-toolbar">
                                                                <li>
                                                                    <a href="#"><i class="fa fa-camera"></i></a>
                                                                </li>
                                                                <li>
                                                                    <a href="#"><i class="fa fa-map-marker"></i></a>
                                                                </li>
                                                            </ul>
                                                            <ul class="compose-btn">
                                                                <li>
                                                                    <a class="btn btn-primary btn-xs">Post</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </section>
                        
                                                    <h4 class="mb-xlg">Timeline</h4>
                        
                                                    <div class="timeline timeline-simple mt-xlg mb-md">
                                                        <div class="tm-body">
                                                            <div class="tm-title">
                                                                <h3 class="h5 text-uppercase">November 2013</h3>
                                                            </div>
                                                            <ol class="tm-items">
                                                                <li>
                                                                    <div class="tm-box">
                                                                        <p class="text-muted mb-none">7 months ago.</p>
                                                                        <p>
                                                                            It's awesome when we find a good solution for our projects, Porto Admin is <span class="text-primary">#awesome</span>
                                                                        </p>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="tm-box">
                                                                        <p class="text-muted mb-none">7 months ago.</p>
                                                                        <p>
                                                                            What is your biggest developer pain point?
                                                                        </p>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="tm-box">
                                                                        <p class="text-muted mb-none">7 months ago.</p>
                                                                        <p>
                                                                            Checkout! How cool is that!
                                                                        </p>
                                                                        <div class="thumbnail-gallery">
                                                                            <a class="img-thumbnail lightbox" href="assets/images/projects/project-4.jpg" data-plugin-options="{ &quot;type&quot;:&quot;image&quot; }">
                                                                                <img class="img-responsive" width="215" src="assets/images/projects/project-4.jpg">
                                                                                <span class="zoom">
                                                                                    <i class="fa fa-search"></i>
                                                                                </span>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ol>
                                                        </div>
                                                    </div>
                                                </div>-->
                        <div id="tab_editar_usuario" class="tab-pane active">

                            <form class="form-horizontal" method="get">
                                <h4 class="mb-xlg">Informacion personal</h4>
                                <fieldset>
                                    <div class="form-group">
                                        <div class="col-md-3">                                            
                                        </div>
                                        <div class="col-md-8">
											<div class="fileinput fileinput-new" data-provides="fileinput">
												<div class="fileinput-preview thumbnail" data-trigger="fileinput" 
													 style="width: 200px; height: 150px;"></div>
												<div>
													<span class="btn btn-ion btn-primary btn-file">
														<span class="fileinput-new">Select image</span>
														<span class="fileinput-exists">Change</span>
														<input type="file" name="fileinput-thumb" accept="image/*">
													</span>
													<a href="#" class="btn btn-ion btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
												</div>
											</div><!-- /fileinput -->
                                        </div>
                                    </div><!-- /form-group -->

                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="us_usuario">Nombre de usuario</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="us_usuario" name="us_usuario">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="profileLastName">Correo electronico</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="profileLastName">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="profileAddress">Fecha de expiracion</label>
                                        <div class="col-md-8">

                                            <div class="input-group date" id="datetimepicker1_us_fecha_expiracion">

                                                <span class="input-group-addon">
                                                    <span class="ion-ios7-calendar-outline icon"></span>
                                                </span>

                                                <input type="text" class="form-control" id="us_fecha_expiracion" 
                                                       name="us_fecha_expiracion" data-format="YYYY/MM/DD">

                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="us_maneja_fecha_expiracion">
                                            Maneja fecha de expiracion
                                        </label>
                                        <div class="col-md-8">

                                            <input type="checkbox" class="form-control" name="us_maneja_fecha_expiracion" 
                                                   id="us_maneja_fecha_expiracion">

                                        </div>
                                    </div>
                                </fieldset>
                                <hr class="dotted tall">
                                <h4 class="mb-xlg">Acerca de ti</h4>
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="profileBio">Biografia</label>
                                        <div class="col-md-8">
                                            <textarea class="form-control" rows="3" id="profileBio"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-xs-3 control-label mt-xs pt-none">Publica</label>
                                        <div class="col-md-8">
                                            <div class="checkbox-custom checkbox-default checkbox-inline mt-xs">
                                                <input type="checkbox" checked="" id="profilePublic">
                                                <label for="profilePublic"></label>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <hr class="dotted tall">
                                <h4 class="mb-xlg">Cambio de contraseña</h4>
                                <fieldset class="mb-xl">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="profileNewPassword">Nueva contraseña</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="profileNewPassword">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="profileNewPasswordRepeat">Repita su contraseña</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="profileNewPasswordRepeat">
                                        </div>
                                    </div>
                                </fieldset>
                                <!--                                <div class="panel-footer">
                                                                    <div class="row">
                                                                        <div class="col-md-9 col-md-offset-3">
                                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                                            <button type="reset" class="btn btn-default">Reset</button>
                                                                        </div>
                                                                    </div>
                                                                </div>-->

                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-3">

                <h4 class="mb-md">Ultimas visitas</h4>
                <!--                <ul class="simple-card-list mb-xlg">
                                    <li class="primary">
                                        <h3>488</h3>
                                        <p>Nullam quris ris.</p>
                                    </li>
                                    <li class="primary">
                                        <h3>$ 189,000.00</h3>
                                        <p>Nullam quris ris.</p>
                                    </li>
                                    <li class="primary">
                                        <h3>16</h3>
                                        <p>Nullam quris ris.</p>
                                    </li>
                                </ul>-->

                <h4 class="mb-md">Modulos</h4>
                <ul class="simple-bullet-list mb-xlg">
                    <li class="red">
                        <span class="title">Porto Template</span>
                        <span class="description truncate">Lorem ipsom dolor sit.</span>
                    </li>
                    <li class="green">
                        <span class="title">Tucson HTML5 Template</span>
                        <span class="description truncate">Lorem ipsom dolor sit amet</span>
                    </li>
                    <li class="blue">
                        <span class="title">Porto HTML5 Template</span>
                        <span class="description truncate">Lorem ipsom dolor sit.</span>
                    </li>
                    <li class="orange">
                        <span class="title">Tucson Template</span>
                        <span class="description truncate">Lorem ipsom dolor sit.</span>
                    </li>
                </ul>


            </div>

        </div>



    </div><!-- /app body -->
</div>

<script>

    $(function () {

        $('#us_maneja_fecha_expiracion').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        }).on('ifChanged', function (e) {
            // Get the field name
            var isChecked = e.currentTarget.checked;

            if (isChecked == true) {

            }
        });

        // bootstrap3-datetimepicker
        $('#datetimepicker1_us_fecha_expiracion').datetimepicker({
            icons: {
                time: 'icon ion-ios7-clock-outline',
                date: 'icon ion-ios7-calendar-outline',
                up: 'icon ion-ios7-arrow-up',
                down: 'icon ion-ios7-arrow-down'
            }
        });


    });

</script>