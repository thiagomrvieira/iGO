
@extends('frontoffice.layouts.guest.app')

@section('content')
    <div id="app">
        {{-- Form Partner --}}
        <div class="row mt-4 mb-4">
        {{-- Image column --}}
        <div class="col-6">
        </div>

        {{-- Form column --}}
        <div class="col-6">

            {{-- Show success message --}}
            <div class="alert alert-success" role="alert"
                v-if="partnerCreated.company_name">
                <h4 class="alert-heading">Olá, @{{ partnerCreated.name }}!</h4>
                <p>O pré-cadasto da <b> @{{ partnerCreated.company_name }} </b> foi efetuado. Em breve entraremos em contacto através do e-mail e telemóvel informado. </p>
            </div>

            {{-- Show validation error --}}
            <div class="alert alert-danger" role="alert"
                v-if="partnrValidationError">
                <h4 class="alert-heading">Erro!</h4>
                <p>  @{{ partnrValidationErrorMessage }} </p>
            </div>

            <form id="partnerCreation" method="POST">
                <div class="mb-2">
                    <input  type="text" class="form-control" id="name" name="name" placeholder="Nome"
                        @change="removeClassError('partnerCreation', 'name')" v-model="partner.name">
                    <small id="nameHelp" class="text-danger"
                        v-if="partnerErrors.includes('name')">
                        Campo obrigatório
                    </small>  
                </div>
                <div class="mb-2">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                        @change="removeClassError('partnerCreation', 'email')" v-model="partner.email">
                    <small id="emailHelp" class="text-danger"
                        v-if="partnerErrors.includes('email')">
                        Campo obrigatório
                    </small>  
                </div>
                <div class="mb-2">
                    <input type="text" class="form-control" id="line_1" name="line_1" placeholder="Morada"
                        @change="removeClassError('partnerCreation', 'line_1')" v-model="partner.line_1">
                    <small id="line_1Help" class="text-danger"
                        v-if="partnerErrors.includes('line_1')">
                        Campo obrigatório
                    </small>  
                </div>
                <div class="mb-2">
                    <input  type="text" class="form-control" id="county" name="county" placeholder="Bairro"
                        @change="removeClassError('partnerCreation', 'county')" v-model="partner.county">
                    <small id="countyHelp" class="text-danger"
                        v-if="partnerErrors.includes('county')">
                        Campo obrigatório
                    </small>  
                </div>
                <div class="mb-2">
                    <input type="text" class="form-control" id="city" name="city" placeholder="Província"
                        @change="removeClassError('partnerCreation', 'city')" v-model="partner.city">
                    <small id="cityHelp" class="text-danger"
                        v-if="partnerErrors.includes('city')" >
                        Campo obrigatório
                    </small>  
                </div>
                <div class="mb-2">
                    <input  type="text" class="form-control"  id="phone_number" name="phone_number" placeholder="Telefone"
                        @change="removeClassError('partnerCreation', 'phone_number')" v-model="partner.phone_number">
                    <small id="phone_numberHelp" class="text-danger"
                        v-if="partnerErrors.includes('phone_number')">
                        Campo obrigatório
                    </small>  
                </div>
                <div class="mb-2">
                    <input  type="text" class="form-control"  id="mobile_phone_number" name="mobile_phone_number" placeholder="Telemóvel"
                        @change="removeClassError('partnerCreation', 'mobile_phone_number')" v-model="partner.mobile_phone_number"> 
                    <small id="mobile_phone_numberHelp" class="text-danger"
                        v-if="partnerErrors.includes('mobile_phone_number')">
                        Campo obrigatório
                    </small>  
                </div>
                <div class="mb-2">
                    <input  type="text" class="form-control" id="company_name" name="company_name" placeholder="Estabelecimento"
                        @change="removeClassError('partnerCreation', 'company_name')" v-model="partner.company_name">
                    <small id="company_nameHelp" class="text-danger"
                        v-if="partnerErrors.includes('company_name')">
                        Campo obrigatório
                    </small>  
                </div>
                <div class="mb-2">
                    <input  type="text" class="form-control" id="tax_number" name="tax_number" placeholder="NIF"
                        @change="removeClassError('partnerCreation', 'tax_number')" v-model="partner.tax_number">
                    <small id="tax_numberHelp" class="text-danger"
                        v-if="partnerErrors.includes('tax_number')">
                        Campo obrigatório
                    </small>  
                </div>
                <div class="mb-2">
                    <select id="category_id" name="category_id" class="form-select"
                        @change="removeClassError('partnerCreation', 'category_id')" v-model="partner.category_id">
                        
                        <option value="" disabled selected>Categoria</option>

                        @foreach ($partnerCategories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-primary" 
                    @click="getFormRequest('partnerCreation', $event)">
                    Enviar
                </button>
            </form>
        </div>
        
        {{-- Form Deliverymen --}}
        <div class="row mt-4 mb-4">
            {{-- Form column --}}
            <div class="col-6">

                {{-- Show success message --}}
                <div class="alert alert-success" role="alert"
                    v-if="deliverymanCreated">
                    <h4 class="alert-heading">Olá, @{{ deliverymanCreated }}!</h4>
                    <p>O seu pré-cadasto foi efetuado. Em breve entraremos em contacto através do e-mail e telemóvel informado. </p>
                </div>
                
                {{-- Show validation error --}}
                <div class="alert alert-danger" role="alert"
                    v-if="delManValidationError">
                    <h4 class="alert-heading">Erro!</h4>
                    <p>  @{{ delManValidationErrorMessage }} </p>
                </div>
                  
                <form id="deliverymanCreation" method="POST">
                    <div class="mb-2">
                        <input type="text" class="form-control" id="name" placeholder="Nome" 
                            @change="removeClassError('deliverymanCreation', 'name')" v-model="deliveryman.name">
                        <small id="nameHelp" class="text-danger"
                            v-if="deliverymanErrors.includes('name')">
                            Campo obrigatório
                        </small>      
                    </div>
                    <div class="mb-2">
                        <input  type="email" class="form-control"  id="email" placeholder="Email"
                            @change="removeClassError('deliverymanCreation', 'email')" v-model="deliveryman.email">
                        <small id="nameHelp" class="text-danger"
                            v-if="deliverymanErrors.includes('email')">
                            Campo obrigatório
                        </small>     
                    </div>
                    <div class="mb-2">
                        <input type="text" class="form-control" id="mobile_phone_number" placeholder="Telemóvel"
                            @change="removeClassError('deliverymanCreation', 'mobile_phone_number')" v-model="deliveryman.mobile_phone_number">
                        <small id="nameHelp" class="text-danger"
                            v-if="deliverymanErrors.includes('mobile_phone_number')">
                            Campo obrigatório
                        </small>     
                    </div>
                    <button class="btn btn-primary" 
                        @click="getFormRequest('deliverymanCreation', $event)"> 
                        Enviar
                    </button>
                </form>
            </div>
            
            {{-- Image column --}}
            <div class="col-6">
            </div>
        </div>
    </div>
    </div>
    
    
    

@endsection

@section('vue-instance')

    <script type="text/javascript">
        new Vue({
            el: '#app',

            data: {

                partner: {
                    name: '',
                    email: '',
                    line_1: '',
                    county: '',
                    city: '',
                    phone_number: '',
                    mobile_phone_number: '',
                    company_name: '',
                    tax_number: '',
                    category_id: '',
                },

                deliveryman: {
                    name: '',
                    email: '',
                    mobile_phone_number: '',
                }, 

                resource: '',
                form : '',
                formAction: '',
                partnerErrors: [],
                deliverymanErrors: [],
                deliverymanCreated: false,
                partnerCreated: {
                    name: null,
                    company_name: null,
                },

                delManValidationError: false,
                delManValidationErrorMessage: '',
                partnrValidationError: false,
                partnrValidationErrorMessage: '',
            },

            methods: {
                //  Handle the form request
                getFormRequest: function (form, event) {
                    event.preventDefault();
                    
                    if (form == 'deliverymanCreation') {
                        this.resource = this.deliveryman;
                        if(this.checkForm(form) ){
                            this.formAction = "{{ route('deliveryman.store.home') }}";
                        }
                    } else {
                        this.resource = this.partner;
                        if(this.checkForm(form) ){
                            this.formAction = "{{ route('partner.store.home') }}";
                        }
                    }

                    if ( this.formAction ) {
                        this.submitForm(event);
                    }
                },

                //  Check input values and show errors
                checkForm(form) {
                    this.deliverymanErrors = [];
                    this.partnerErrors = [];

                    Object.entries(this.resource).forEach(([key, value]) => {
                        if (!this.resource[key]) { 
                            $(`#${form} #${key}`).addClass("is-invalid");
                            (form == 'deliverymanCreation') ? this.deliverymanErrors.push(key) : this.partnerErrors.push(key);
                        }
                    });

                    return (this.partnerErrors.length || this.deliverymanErrors.length) ? false : true;
                },

                //  Submit forms
                submitForm() {
                    axios.post(this.formAction, {
                        resource: this.resource,
                    })
                    .then(response => {
                        if (Object.keys(response.data.resource).length > 6) {
                            this.partnerCreated.name = (response.status == 201) ?  response.data.resource.name : null;
                            this.partnerCreated.company_name = (response.status == 201) ?  response.data.resource.company_name : null;
                        } else {
                            this.deliverymanCreated = (response.status == 201) ?  response.data.resource.name : null;
                        }
                        this.cleanInputs(this.resource);
                    })
                    .catch((error) => {
                        console.log(Object.keys(this.resource).length); 
                        if (Object.keys(this.resource).length > 3) {
                            this.partnrValidationError = true;
                            this.partnrValidationErrorMessage = "Não foi possível cadastar o aderente com os dados informados";
                        } else {
                            this.delManValidationError = true;
                            this.delManValidationErrorMessage = "Não foi possível cadastar o estafeta com os dados informados";
                        }
                    });
                },

                //  Clean form inputs after requests
                cleanInputs(resource){
                    this.formAction = '';
                    
                    Object.keys(resource).forEach(key => {
                        resource[key] = '';
                    });
                },

                //  Remove error class and messages
                removeClassError(form, inputId){
                    $(`#${form} #${inputId}`).removeClass('is-invalid');
                    if (form == 'deliverymanCreation') {
                        this.deliverymanErrors = this.deliverymanErrors.filter(item => item !== inputId);
                        this.delManValidationError = false;
                        this.delManValidationErrorMessage = '';
                        
                    } else {
                        this.partnerErrors = this.partnerErrors.filter(item => item !== inputId);
                        this.partnrValidationError = false;
                        this.partnrValidationErrorMessage = '';
                    }

                }
            }

        })
    </script>
@endsection