
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
            <form id="partnerCreation" method="POST">
                <div class="mb-2">
                    <input @change="removeClassError('partnerCreation', 'name')" type="text" class="form-control" v-model="partner.name" id="name" name="name" placeholder="Nome">
                    <small v-if="partnerErrors.includes('name')" id="nameHelp" class="text-danger">
                        Campo obrigatório
                    </small>  
                </div>
                <div class="mb-2">
                    <input @change="removeClassError('partnerCreation', 'email')" type="email" class="form-control" v-model="partner.email" id="email" name="email" placeholder="Email">
                    <small v-if="partnerErrors.includes('email')" id="emailHelp" class="text-danger">
                        Campo obrigatório
                    </small>  
                </div>
                <div class="mb-2">
                    <input @change="removeClassError('partnerCreation', 'line_1')" type="text" class="form-control" v-model="partner.line_1" id="line_1" name="line_1" placeholder="Morada">
                    <small v-if="partnerErrors.includes('line_1')" id="line_1Help" class="text-danger">
                        Campo obrigatório
                    </small>  
                </div>
                <div class="mb-2">
                    <input @change="removeClassError('partnerCreation', 'county')" type="text" class="form-control" v-model="partner.county" id="county" name="county" placeholder="Bairro">
                    <small v-if="partnerErrors.includes('county')" id="countyHelp" class="text-danger">
                        Campo obrigatório
                    </small>  
                </div>
                <div class="mb-2">
                    <input @change="removeClassError('partnerCreation', 'city')" type="text" class="form-control" v-model="partner.city" id="city" name="city" placeholder="Província">
                    <small v-if="partnerErrors.includes('city')" id="cityHelp" class="text-danger">
                        Campo obrigatório
                    </small>  
                </div>
                <div class="mb-2">
                    <input @change="removeClassError('partnerCreation', 'phone_number')" type="text" class="form-control" v-model="partner.phone_number" id="phone_number" name="phone_number" placeholder="Telefone">
                    <small v-if="partnerErrors.includes('phone_number')" id="phone_numberHelp" class="text-danger">
                        Campo obrigatório
                    </small>  
                </div>
                <div class="mb-2">
                    <input @change="removeClassError('partnerCreation', 'mobile_phone_number')" type="text" class="form-control" v-model="partner.mobile_phone_number" id="mobile_phone_number" name="mobile_phone_number" placeholder="Telemóvel">
                    <small v-if="partnerErrors.includes('mobile_phone_number')" id="mobile_phone_numberHelp" class="text-danger">
                        Campo obrigatório
                    </small>  
                </div>
                <div class="mb-2">
                    <input @change="removeClassError('partnerCreation', 'company_name')" type="text" class="form-control" v-model="partner.company_name" id="company_name" name="company_name" placeholder="Estabelecimento">
                    <small v-if="partnerErrors.includes('company_name')" id="company_nameHelp" class="text-danger">
                        Campo obrigatório
                    </small>  
                </div>
                <div class="mb-2">
                    <input @change="removeClassError('partnerCreation', 'tax_number')" type="text" class="form-control" v-model="partner.tax_number" id="tax_number" name="tax_number" placeholder="NIF">
                    <small v-if="partnerErrors.includes('tax_number')" id="tax_numberHelp" class="text-danger">
                        Campo obrigatório
                    </small>  
                </div>
                <div class="mb-2">
                    <select @change="removeClassError('partnerCreation', 'category_id')" v-model="partner.category_id" id="category_id" name="category_id" class="form-select">
                        <option value="" disabled selected>Categoria</option>

                        @foreach ($partnerCategories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-primary" @click="getFormRequest('partnerCreation', $event)">Enviar</button>
            </form>
        </div>
        
        {{-- Form Deliverymen --}}
        <div class="row mt-4 mb-4">
            {{-- Form column --}}
            <div class="col-6">
                <form id="deliverymanCreation" method="POST">
                    <div class="mb-2">
                        <input @change="removeClassError('deliverymanCreation', 'name')" type="text" class="form-control" v-model="deliveryman.name" id="name" placeholder="Nome" >
                        <small v-if="deliverymanErrors.includes('name')" id="nameHelp" class="text-danger">
                            Campo obrigatório
                        </small>      
                    </div>
                    <div class="mb-2">
                        <input @change="removeClassError('deliverymanCreation', 'email')" type="email" class="form-control" v-model="deliveryman.email" id="email" placeholder="Email">
                        <small v-if="deliverymanErrors.includes('email')" id="nameHelp" class="text-danger">
                            Campo obrigatório
                        </small>     
                    </div>
                    <div class="mb-2">
                        <input @change="removeClassError('deliverymanCreation', 'mobile_phone_number')" type="text" class="form-control" v-model="deliveryman.mobile_phone_number" id="mobile_phone_number" placeholder="Telemóvel">
                        <small v-if="deliverymanErrors.includes('mobile_phone_number')" id="nameHelp" class="text-danger">
                            Campo obrigatório
                        </small>     
                    </div>
                    <button class="btn btn-primary"  @click="getFormRequest('deliverymanCreation', $event)"> Enviar</button>
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
                    }).then(response => {
                        this.response = JSON.stringify(response, null, 2)
                        console.log(response)
                        this.cleanInputs(this.resource);
                    })
                },

                //  Clean form inputs after requests
                cleanInputs(resource){
                    Object.keys(resource).forEach(key => {
                        resource[key] = '';
                    });
                },

                //  Remove error class and messages
                removeClassError(form, inputId){
                    $(`#${form} #${inputId}`).removeClass('is-invalid');
                    if (form == 'deliverymanCreation') {
                        this.deliverymanErrors = this.deliverymanErrors.filter(item => item !== inputId)
                    } else {
                        this.partnerErrors = this.partnerErrors.filter(item => item !== inputId)
                    }

                }
            }

        })
    </script>
@endsection